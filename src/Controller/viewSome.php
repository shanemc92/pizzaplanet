<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Orders;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;   

class viewSome extends AbstractController
{
    /**
     * @Route("/viewSome", name="viewSome")
     */
    public function index(){
        $request = Request::createFromGlobals(); // the envelope, and were looking inside it.

        // get the variables
            $date1 = $request->request->get('date1', 'none');
            $date2 = $request->request->get('date2', 'none');


        $entityManager = $this->getDoctrine()->getManager();        

        $orders = $this->getDoctrine()->getRepository(Orders::class)->findAll();
       
        $output = ''; // html the user will see

        $cost = 0;
        $count = '';

        $output = '<table data-role="table" id="ordersTable"  class="ui-body-d ui-shadow table-stripe ui-responsive ui-table">
            <thead>
                <tr class="ui-bar-d">
                    <th>Order</th>
                    <th>Placed By</th>
                    <th>Details</th>
                    <th>Address</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Update</th>
                </tr>
             </thead>
        <tbody>'; // html the user will see

        

        foreach($orders as $pro){
            $datecreated = $pro->getCreated();
            $date = $datecreated->format('Y-m-d');
            //$date1 = strtotime($date1);
            //$date2 = strtotime($date2);
            if($date >= $date1 && $date <= $date2){
                    $output .= '<tr>'; // one row
                    $output .= '<td>' . $pro->getId() . '</td>';
                    $output .= '<td>' . $pro->getPlacedby() . '</td>';
                    $detail = explode('+=====+', $pro->getDetails()); // break it apart based on +=.
                    $output .= '<td>' . $detail[0] . '</td>'; // Detail
                    $output .= '<td>' . $detail[1] . '</td>'; // Address
                    $output .= '<td>' . $detail[2] . '</td>'; // Total
                    $output .= '<td>' . $pro->getStatus() . '</td>';
                    $output .= '<td><button class="cancelOrder ui-btn" orderid="'. $pro->getId() .'">Cancel Order</button></td>';
                $output .= '</tr>';
            $indcost = explode('€', $detail[2]);
            $cost += (int)str_replace(' ', '', $indcost[1]);
            $count ++; 
            }
        }
        $output .= '</tbody></table>';
        $totals = '<p><b>Total Orders</b>: '.$count.'<br><b>Total Revenue:</b> €'.$cost.'<br>';

        $output = $totals . $output;
        return new Response(
            $output
        );

    }
}
