<?php

namespace AgendaPedalBundle\Services\PaisEstadoCidade;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

/**
 * Class PaisEstadoCidadeCarregador
 * @package AgendaPedalBundle\Services\PaisEstadoCidade
 */
class PaisEstadoCidadeCarregador
{
    /**
     * @var EntityManager
     */
    private $em;
    /**
     * @var EntityRepository
     */
    private $paisRepository;
    /**
     * @var EntityRepository
     */
    private $estadoRepository;
    /**
     * @var EntityRepository
     */
    private $cidadeRepository;

    //------------------------------------------Mágicos----------------------------------------------//

    /**
     * PaisEstadoCidadeCarregador constructor.
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->em               = $entityManager;
        $this->paisRepository   = $this->em->getRepository('AgendaPedalBundle:Pais');
        $this->estadoRepository = $this->em->getRepository('AgendaPedalBundle:Estado');
        $this->cidadeRepository = $this->em->getRepository('AgendaPedalBundle:Cidade');
    }

    //------------------------------------------Privados---------------------------------------------//

    //-----------------------------------------Protegidos--------------------------------------------//

    //------------------------------------------Publicos---------------------------------------------//

    /**
     * @return array
     */
    public function findAllPaises()
    {
        return $this->paisRepository->findAll();
    }

    /**
     * @return array
     */
    public function findAllEstados()
    {
        return $this->estadoRepository->findAll();
    }

    /**
     * @param string $id
     * @return null|object
     */
    public function findEstado($id)
    {
        return $this->estadoRepository->find($id);
    }

    /**
     * @param object $estado
     * @return array
     */
    public function findCidadesByEstado($estado)
    {
        return $this->cidadeRepository->findBy(array(
                'estado' => $estado
            )
        );
    }

    //--------------------------------------Getters & Setters----------------------------------------//
}
