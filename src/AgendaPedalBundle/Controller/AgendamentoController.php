<?php

namespace AgendaPedalBundle\Controller;

use AgendaPedalBundle\Entity\Agendamento;
use AgendaPedalBundle\Utils\UtilFormat;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

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
     * @Route("/" , name="agendamento")
     * @return \Symfony\Component\HttpFoundation\Response
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

    /**
     * @Route("/agendamento/salvar" , name="agendamentoSalvar")
     * @param Request $request
     * @return JsonResponse
     */
    public function salvarAction(Request $request)
    {
        /* @var $distanciaCarregador \AgendaPedalBundle\Services\DistanciaPedal\DistanciaPedalCarregador */
        $distanciaCarregador = $this->get('agenda_pedal.distancia_pedal.carregador');
        /* @var $ritmoCarregador \AgendaPedalBundle\Services\RitmoPedal\RitmoPedalCarregador */
        $ritmoCarregador = $this->get('agenda_pedal.ritmo_pedal.carregador');
        /* @var $tipoCarregador \AgendaPedalBundle\Services\TipoPedal\TipoPedalCarregador */
        $tipoCarregador = $this->get('agenda_pedal.tipo_pedal.carregador');
        /* @var $paisEstadoCidadeCarregador \AgendaPedalBundle\Services\PaisEstadoCidade\PaisEstadoCidadeCarregador */
        $paisEstadoCidadeCarregador = $this->get('agenda_pedal.pais_estado_cidade.carregador');

        $dataPedal      = $request->request->get('dataPedal');
        $horaPedal      = $request->request->get('horaPedal');
        $nomePedal      = $request->request->get('nomePedal');
        $tipoPedal      = $request->request->get('tipoPedal');
        $ritmoPedal     = $request->request->get('ritmoPedal');
        $distanciaPedal = $request->request->get('distanciaPedal');
        $estado         = $request->request->get('estado');
        $cidade         = $request->request->get('cidade');
        $apoioCarro     = $request->request->get('apoioCarro');
        $observacoes    = $request->request->get('observacoes');
        $localSaida     = $request->request->get('localSaida');
        $localDestino   = $request->request->get('localDestino');

        /* @var $agendamentoManipulador \AgendaPedalBundle\Services\Agendamento\AgendamentoManipulador */
        $agendamentoManipulador = $this->get('agenda_pedal.agendamento.manipulador');

        /* @var $agendamento \AgendaPedalBundle\Entity\Agendamento */
        $agendamento = new Agendamento();

        if ($dataPedal) {
            $agendamento->setDataPedal(UtilFormat::brToDate($dataPedal));
        }
        if ($horaPedal) {
            $agendamento->setHoraPedal($horaPedal);
        }
        if ($nomePedal) {
            $agendamento->setNome($nomePedal);
        }
        if ($tipoPedal) {
            $agendamento->setTipoPedal($tipoCarregador->find($tipoPedal));
        }
        if ($ritmoPedal) {
            $agendamento->setRitmoPedal($ritmoCarregador->find($ritmoPedal));
        }
        if ($distanciaPedal) {
            $agendamento->setDistanciaPedal($distanciaCarregador->find($distanciaPedal));
        }
        if ($estado) {
            $agendamento->setEstado($paisEstadoCidadeCarregador->findEstado($estado));
        }
        if ($cidade) {
            $agendamento->setCidade($paisEstadoCidadeCarregador->findCidade($cidade));
        }
        if ($localSaida) {
            $agendamento->setLocalSaida($localSaida);
        }
        if ($localDestino) {
            $agendamento->setLocalDestino($localDestino);
        }
        if ($observacoes) {
            $agendamento->setObservacoes($observacoes);
        }
        $agendamento->setApoio($apoioCarro);

        $agendamentoManipulador->salvar($agendamento);

        return new JsonResponse();
    }
    //--------------------------------------Getters & Setters----------------------------------------//

}
