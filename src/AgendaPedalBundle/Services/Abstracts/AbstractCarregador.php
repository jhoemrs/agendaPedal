<?php

namespace AgendaPedalBundle\Services\Abstracts;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

/**
 * Class AbstractCarregador
 * @package AgendaPedalBundle\Services\Abstracts
 */
abstract class AbstractCarregador
{
    /**
     * @var EntityManager
     */
    protected $em;
    /**
     * @var EntityRepository
     */
    protected $repository;

    //------------------------------------------Mágicos----------------------------------------------//

    /**
     * @param EntityManager $em
     * @param string        $repositoryName
     */
    public function __construct(EntityManager $em, $repositoryName)
    {
        $this->em = $em;
        $this->repository = $this->em->getRepository($repositoryName);
    }

    //------------------------------------------Privados---------------------------------------------//

    //-----------------------------------------Protegidos--------------------------------------------//

    //------------------------------------------Publicos---------------------------------------------//

    /**
     * @return array
     */
    public function findAll()
    {
        return $this->repository->findAll();
    }

    /**
     * @param array      $criteria
     * @param array|null $orderBy
     * @param null       $limit
     * @param null       $offset
     * @return array
     */
    public function findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
    {
        return $this->repository->findBy($criteria, $orderBy, $limit, $offset);
    }

    /**
     * @param int $id
     * @return null|object
     */
    public function find($id)
    {
        return $this->repository->find($id);
    }

    /**
     * @param array $criteria
     * @param array $orderBy
     * @return null|object
     */
    public function findOneBy(array $criteria, array $orderBy = null)
    {
        return $this->repository->findOneBy($criteria, $orderBy);
    }

    //--------------------------------------Getters & Setters----------------------------------------//
}