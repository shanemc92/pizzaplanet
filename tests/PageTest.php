<?php
namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PageTest extends WebTestCase
{
    public function testDoesKyleURLExist()
    {
        $client = static::createClient();

        $client->request('GET', '/Register');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

    }
    
    
    
    public function testContent(){
        $client = static::createClient();

        $client->request('GET', '/lazy');

        $this->assertContains(
            'page',
            $client->getResponse()->getContent()
        );
    }
    
    
    
    public function testRegisterPage(){
        $client = static::createClient();

        $client->request('GET', '/Register');

        $this->assertContains(
            'This page is the register page',
            $client->getResponse()->getContent()
        );
    }
    
    
    
}


