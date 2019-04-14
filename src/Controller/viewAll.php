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
    public function index()
    {
        
      $entityManager = $this->getDoctrine()->getManager();        
     
      $orders = $this->getDoctrine()->getRepository(Orders::class)->findAll();
       

        $output = ''; // html the user will see
      
        foreach($orders as $pro){ 
            
            if($pro->getStatus() == 'Getting Ready'){
                $output .= '===<br><br>' . $pro->getDetails(); // get the raw serialized order, breaking when we see the equals
            }
        }

        return new Response(
            $output
        );
    }
}
