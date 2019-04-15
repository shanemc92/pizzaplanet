<?php
namespace App\Controller;

use PHPUnit\Framework\TestCase;

class BackendTest extends TestCase
{
    public function testNumber()
    {
        $lucky = new LuckyController();
        
        
        $result = $lucky->getANumber();
       
        
        $this->assertEquals(55, $result);
    }
    
    
    public function Login(){
        
        // ID of the user account.
        
        // when we start, ID is set to 0.
        $id = 0;
        
        $lucky = new LuckyController(); // class under test.
               
        $id = $lucky->getUserID();
          
        $this->assertEquals(1, $id);
    }
}




