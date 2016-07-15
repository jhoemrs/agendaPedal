<?php

namespace AgendaPedalBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Class AgendamentoListaController
 * @package AgendaPedalBundle\Controller
 */
class AgendamentoListaController extends Controller
{
    /**
     * @Route("/agendamento/lista", name="agendamentoLista")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listaAction()
    {
        /* @var $carregadorAgendamento \AgendaPedalBundle\Services\Agendamento\AgendamentoCarregador */
        $carregadorAgendamento = $this->get('agenda_pedal.agendamento.carregador');

        $agendamentos = $carregadorAgendamento->findAll();

        return $this->render('AgendaPedalBundle:AgendamentoLista:lista.html.twig', array(
            'agendamentos' => $agendamentos
        ));
    }

}
