<?php

namespace AgendaPedalBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class AgendamentoController
 * @package AgendaPedalBundle\Controller
 */
class AgendamentoController extends Controller
{
    //------------------------------------------Mágicos----------------------------------------------//

    //------------------------------------------Privados---------------------------------------------//

    /**
     * @param string $idEstado
     * @return array
     */
    private function carregarOpcoesCidadePorEstado($idEstado)
    {
        /* @var $paisEstadoCidadeCarregador \AgendaPedalBundle\Services\PaisEstadoCidade\PaisEstadoCidadeCarregador */
        $paisEstadoCidadeCarregador = $this->get('agenda_pedal.pais_estado_cidade.carregador');

        $estado = $paisEstadoCidadeCarregador->findEstado($idEstado);
        $cidades = $paisEstadoCidadeCarregador->findCidadesByEstado($estado);

        $listaCidades = array();

        foreach ($cidades as $cidade) {
            $listaCidades[] = array(
                'id' => $cidade->getId(),
                'nome' => $cidade->getNome(),
            );
        }

        return $listaCidades;
    }

    //-----------------------------------------Protegidos--------------------------------------------//

    //------------------------------------------Publicos---------------------------------------------//

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/" , name="agendamento")
     */
    public function indexAction()
    {
        /* @var $distanciaCarregador \AgendaPedalBundle\Services\DistanciaPedal\DistanciaPedalCarregador */
        $distanciaCarregador = $this->get('agenda_pedal.distancia_pedal.carregador');
        /* @var $ritmoCarregador \AgendaPedalBundle\Services\RitmoPedal\RitmoPedalCarregador */
        $ritmoCarregador = $this->get('agenda_pedal.ritmo_pedal.carregador');
        /* @var $tipoCarregador \AgendaPedalBundle\Services\TipoPedal\TipoPedalCarregador */
        $tipoCarregador = $this->get('agenda_pedal.tipo_pedal.carregador');

        $distancias = $distanciaCarregador->findAll();
        $ritmos     = $ritmoCarregador->findAll();
        $tipos      = $tipoCarregador->findAll();

        /* @var $paisEstadoCidadeCarregador \AgendaPedalBundle\Services\PaisEstadoCidade\PaisEstadoCidadeCarregador */
        $paisEstadoCidadeCarregador = $this->get('agenda_pedal.pais_estado_cidade.carregador');

        $estados = $paisEstadoCidadeCarregador->findAllEstados();

        return $this->render('AgendaPedalBundle:Agendamento:index.html.twig', array(
            'distancias' => $distancias,
            'ritmos'     => $ritmos,
            'tipos'      => $tipos,
            'estados'    => $estados
        ));
    }

    /**
     * @Route("/agendamento/cidadesPorEstado/{estado}" , name="agendamentoCidadesPorEstado")
     * @param string $estado
     * @return JsonResponse
     */
    public function testeAction($estado)
    {
        return new JsonResponse(array(
            'cidades' => $this->carregarOpcoesCidadePorEstado($estado),
        ));
    }

    //--------------------------------------Getters & Setters----------------------------------------//

}
