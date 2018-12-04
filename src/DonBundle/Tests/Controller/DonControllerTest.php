<?php

namespace DonBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DonControllerTest extends WebTestCase
{
    public function testCreatedon()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/don/create');
    }

    public function testShowdon()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/don/show');
    }

}
