<?php

namespace AgendaPedalBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Class AgendamentoControllerTest
 * @package AgendaPedalBundle\Tests\Controller
 */
class AgendamentoControllerTest extends WebTestCase
{
    /**
     * 
     */
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/index');
    }

}
