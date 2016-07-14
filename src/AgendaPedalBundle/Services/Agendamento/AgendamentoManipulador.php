<?php

namespace AgendaPedalBundle\Services\Agendamento;

use AgendaPedalBundle\Entity\Agendamento;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

/**
 * Class AgendamentoManipulador
 * @package AgendaPedalBundle\Services\Agendamento
 */
class AgendamentoManipulador
{
    private $em;

    //------------------------------------------Mágicos----------------------------------------------//

    /**
     * AgendamentoManipulador constructor.
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
    }

    //------------------------------------------Privados---------------------------------------------//

    //-----------------------------------------Protegidos--------------------------------------------//

    //------------------------------------------Publicos---------------------------------------------//

    /**
     * @param Agendamento $entity
     */
    public function salvar($entity)
    {
        $this->em->persist($entity);
        $this->em->flush();
    }

    /**
     * @param Agendamento $entity
     */
    public function excluir($entity)
    {
        $this->em->remove($entity);
        $this->em->flush();
    }

    //--------------------------------------Getters & Setters----------------------------------------//
}