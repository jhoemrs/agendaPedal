<?php

namespace AgendaPedalBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AgendamentoListaControllerTest extends WebTestCase
{
    public function testLista()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/agendamento/lista');
    }

}
