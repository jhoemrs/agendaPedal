<?php

namespace AgendaPedalBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Class AgendamentoController
 * @package AgendaPedalBundle\Controller
 */
class AgendamentoController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/" , name="agendamento")
     */
    public function indexAction()
    {
        return $this->render('AgendaPedalBundle:Agendamento:index.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/teste" , name="testeServices")
     */
    public function testeAction()
    {
        $distanciaCarregador = $this->get('agenda_pedal.distancia_pedal.carregador');

        $ritmoCarregador = $this->get('agenda_pedal.ritmo_pedal.carregador');

        $tipoCarregador = $this->get('agenda_pedal.tipo_pedal.carregador');

        var_dump($distanciaCarregador->findAll());

        var_dump($ritmoCarregador->findAll());

        var_dump($tipoCarregador->findAll());

        var_dump('cheguei aqui');exit;
    }

}
