<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Orders;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;   

class viewAll extends AbstractController
{
    /**
     * @Route("/viewAll", name="viewall")
     */
    public function index(){
        $entityManager = $this->getDoctrine()->getManager();        

        $orders = $this->getDoctrine()->getRepository(Orders::class)->findAll();
       
        $output = ''; // html the user will see

        $output = '
        <table data-role="table" id="ordersTable"  class="ui-body-d ui-shadow table-stripe ui-responsive ui-table">
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
            if($pro->getStatus() == 'Getting Ready'){
                $output .= '<tr>'; // one row
                    $output .= '<td>' . $pro->getId() . '</td>';
                    $output .= '<td>' . $pro->getPlacedby() . '</td>';
                    $detail = explode('+=====+', $pro->getDetails()); // break it apart based on +=.
                    $output .= '<td>' . $detail[0] . '</td>'; // Detail
                    $output .= '<td>' . $detail[1] . '</td>'; // Address
                    $output .= '<td>' . $detail[2] . '</td>'; // Total
                    $output .= '<td>' . $pro->getStatus() . '</td>';
                    $output .= '<td><button class="updateStatus ui-btn" orderid="'. $pro->getId() .'">Completed</button></td>';
                $output .= '</tr>';    
            }
        }
        $output .= '</tbody></table>';

        return new Response(
            $output
        );

    }
}
