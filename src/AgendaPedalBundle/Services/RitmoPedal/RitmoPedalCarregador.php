<?php

namespace AgendaPedalBundle\Services\RitmoPedal;

use AgendaPedalBundle\Services\Abstracts\AbstractCarregador;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

/**
 * Class RitmoPedalCarregador
 * @package AgendaPedalBundle\Services\RitmoPedal
 */
class RitmoPedalCarregador extends AbstractCarregador
{
    //------------------------------------------Mágicos----------------------------------------------//

    /**
     * RitmoPedalCarregador constructor.
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        parent::__construct($entityManager, 'AgendaPedalBundle:RitmoPedal');
    }

    //------------------------------------------Privados---------------------------------------------//

    //-----------------------------------------Protegidos--------------------------------------------//

    //------------------------------------------Publicos---------------------------------------------//

    //--------------------------------------Getters & Setters----------------------------------------//
}