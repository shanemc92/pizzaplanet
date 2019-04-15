<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Orders;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;   

class viewCust extends AbstractController
{
    /**
     * @Route("/viewCust", name="viewCust")
     */
    public function index(){
        $request = Request::createFromGlobals(); // the envelope, and were looking inside it.

        // get the variables
            $cust = $request->request->get('cust', 'none');


        $entityManager = $this->getDoctrine()->getManager();        

        $orders = $this->getDoctrine()->getRepository(Orders::class)->findAll();
       
        $output = ''; // html the user will see

        $output = '<table data-role="table" id="custOrdersTable"  class="ui-body-d ui-shadow table-stripe ui-responsive ui-table">
            <thead>
                <tr class="ui-bar-d">
                    <th>Order</th>
                    <th>Placed By</th>
                    <th>Details</th>
                    <th>Address</th>
                    <th>Total</th>
                    <th>Status</th>
                </tr>
             </thead>
        <tbody>'; // html the user will see

            foreach($orders as $pro){
            
            if($cust == $pro->getPlacedby()){
                    $output .= '<tr>'; // one row
                    $output .= '<td>' . $pro->getId() . '</td>';
                    $output .= '<td>' . $pro->getPlacedby() . '</td>';
                    $detail = explode('+=====+', $pro->getDetails()); // break it apart based on +=.
                    $output .= '<td>' . $detail[0] . '</td>'; // Detail
                    $output .= '<td>' . $detail[1] . '</td>'; // Address
                    $output .= '<td>' . $detail[2] . '</td>'; // Total
                    $output .= '<td>' . $pro->getStatus() . '</td>';
                $output .= '</tr>';
            }
        }
        $output .= '</tbody></table>';

        return new Response(
            $output
        );

    }
}
