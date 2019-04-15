<?php
namespace App\Tests;

use PHPUnit\Framework\TestCase;

class BackendTest extends TestCase
{
    public function testRegister()
    {
        $test = new Backend();
        
        
        $result = $test->index(type:'register', username:'test', password:'test', acctype:'test');
       
        
        $this->assertEquals('test', $result);
    }
    
}