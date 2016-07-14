<?php

namespace AgendaPedalBundle\Services\DistanciaPedal;

use AgendaPedalBundle\Services\Abstracts\AbstractCarregador;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

/**
 * Class DistanciaPedalCarregador
 * @package AgendaPedalBundle\Services\DistanciaPedal
 */
class DistanciaPedalCarregador extends AbstractCarregador
{

    //------------------------------------------Mágicos----------------------------------------------//

    /**
     * DistanciaPedalCarregador constructor.
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        parent::__construct($entityManager, 'AgendaPedalBundle:DistanciaPedal');
    }

    //------------------------------------------Privados---------------------------------------------//

    //-----------------------------------------Protegidos--------------------------------------------//

    //------------------------------------------Publicos---------------------------------------------//

    //--------------------------------------Getters & Setters----------------------------------------//
}