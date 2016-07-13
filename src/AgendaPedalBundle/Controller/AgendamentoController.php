<?php

namespace AgendaPedalBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

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

}
