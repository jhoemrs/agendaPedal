<?php

namespace AgendaPedalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Agendamento
 *
 * @ORM\Table(name="agendamento")
 * @ORM\Entity(repositoryClass="AgendaPedalBundle\Repository\AgendamentoRepository")
 */
class Agendamento
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=255)
     */
    private $nome;

    /**
     * @var bool
     *
     * @ORM\Column(name="apoio", type="boolean")
     */
    private $apoio;

    /**
     * @var string
     *
     * @ORM\Column(name="observacoes", type="string", length=255)
     */
    private $observacoes;

    /**
     * @ORM\OneToOne(targetEntity="DistanciaPedal")
     * @ORM\JoinColumn(name="distancia_pedal", referencedColumnName="codigo")
     */
    private $distanciaPedal;

    /**
     * @ORM\OneToOne(targetEntity="RitmoPedal")
     * @ORM\JoinColumn(name="ritmo_pedal", referencedColumnName="codigo")
     */
    private $ritmoPedal;

    /**
     * @ORM\OneToOne(targetEntity="TipoPedal")
     * @ORM\JoinColumn(name="tipo_pedal", referencedColumnName="codigo")
     */
    private $tipoPedal;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nome
     *
     * @param string $nome
     *
     * @return Agendamento
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get nome
     *
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set apoio
     *
     * @param boolean $apoio
     *
     * @return Agendamento
     */
    public function setApoio($apoio)
    {
        $this->apoio = $apoio;

        return $this;
    }

    /**
     * Get apoio
     *
     * @return bool
     */
    public function getApoio()
    {
        return $this->apoio;
    }

    /**
     * Set observacoes
     *
     * @param string $observacoes
     *
     * @return Agendamento
     */
    public function setObservacoes($observacoes)
    {
        $this->observacoes = $observacoes;

        return $this;
    }

    /**
     * Get observacoes
     *
     * @return string
     */
    public function getObservacoes()
    {
        return $this->observacoes;
    }
}

