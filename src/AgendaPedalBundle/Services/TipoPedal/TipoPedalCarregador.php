<?php

namespace AgendaPedalBundle\Services\TipoPedal;

use AgendaPedalBundle\Services\Abstracts\AbstractCarregador;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

/**
 * Class TipoPedalCarregador
 * @package AgendaPedalBundle\Services\TipoPedal
 */
class TipoPedalCarregador extends AbstractCarregador
{
    //------------------------------------------Mágicos----------------------------------------------//

    /**
     * TipoPedalCarregador constructor.
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        parent::__construct($entityManager, 'AgendaPedalBundle:TipoPedal');
    }

    //------------------------------------------Privados---------------------------------------------//

    //-----------------------------------------Protegidos--------------------------------------------//

    //------------------------------------------Publicos---------------------------------------------//

    //--------------------------------------Getters & Setters----------------------------------------//
}