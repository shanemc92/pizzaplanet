<?php
namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PageTest extends WebTestCase
{
    public function doesBackendExist()
    {
        $client = static::createClient();

        $client->request('GET', '/Backend');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

    }
    
   public function doesViewAllExist()
    {
        $client = static::createClient();

        $client->request('GET', '/viewAll');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

    }
	public function doesViewCustExist()
    {
        $client = static::createClient();

        $client->request('GET', '/viewCust');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

    }
	public function doesViewSomeExist()
    {
        $client = static::createClient();

        $client->request('GET', '/viewSome');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

    }
}



