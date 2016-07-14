<?php

namespace AgendaPedalBundle\Services\Agendamento;

use AgendaPedalBundle\Services\Abstracts\AbstractCarregador;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

/**
 * Class AgendamentoCarregador
 * @package AgendaPedalBundle\Services\Agendamento
 */
class AgendamentoCarregador extends AbstractCarregador
{

    //------------------------------------------Mágicos----------------------------------------------//

    /**
     * AgendamentoCarregador constructor.
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        parent::__construct($entityManager, 'AgendaPedalBundle:Agendamento');
    }

    //------------------------------------------Privados---------------------------------------------//

    //-----------------------------------------Protegidos--------------------------------------------//

    //------------------------------------------Publicos---------------------------------------------//

    //--------------------------------------Getters & Setters----------------------------------------//
}