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
     * @ORM\ManyToOne(targetEntity="DistanciaPedal")
     * @ORM\JoinColumn(name="distancia_pedal", referencedColumnName="codigo")
     */
    private $distanciaPedal;

    /**
     * @ORM\ManyToOne(targetEntity="RitmoPedal")
     * @ORM\JoinColumn(name="ritmo_pedal", referencedColumnName="codigo")
     */
    private $ritmoPedal;

    /**
     * @ORM\ManyToOne(targetEntity="TipoPedal")
     * @ORM\JoinColumn(name="tipo_pedal", referencedColumnName="codigo")
     */
    private $tipoPedal;

    /**
     * @ORM\ManyToOne(targetEntity="Estado")
     * @ORM\JoinColumn(name="estado", referencedColumnName="id")
     */
    private $estado;

    /**
     * @ORM\ManyToOne(targetEntity="Cidade")
     * @ORM\JoinColumn(name="cidade", referencedColumnName="id")
     */
    private $cidade;

    /**
     * @var \DateTime
     * @ORM\Column(name="data_pedal", type="datetime")
     */
    private $dataPedal;

    /**
     * @var string
     *
     * @ORM\Column(name="hora_pedal", type="string", length=255)
     */
    private $horaPedal;

    /**
     * @var string
     *
     * @ORM\Column(name="local_saida", type="string", length=255)
     */
    private $localSaida;

    /**
     * @var string
     *
     * @ORM\Column(name="local_destino", type="string", length=255)
     */
    private $localDestino;

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

    /**
     * @return mixed
     */
    public function getDistanciaPedal()
    {
        return $this->distanciaPedal;
    }

    /**
     * @param mixed $distanciaPedal
     * @return Agendamento
     */
    public function setDistanciaPedal($distanciaPedal)
    {
        $this->distanciaPedal = $distanciaPedal;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getRitmoPedal()
    {
        return $this->ritmoPedal;
    }

    /**
     * @param mixed $ritmoPedal
     * @return Agendamento
     */
    public function setRitmoPedal($ritmoPedal)
    {
        $this->ritmoPedal = $ritmoPedal;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTipoPedal()
    {
        return $this->tipoPedal;
    }

    /**
     * @param mixed $tipoPedal
     * @return Agendamento
     */
    public function setTipoPedal($tipoPedal)
    {
        $this->tipoPedal = $tipoPedal;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param mixed $estado
     * @return Agendamento
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCidade()
    {
        return $this->cidade;
    }

    /**
     * @param mixed $cidade
     * @return Agendamento
     */
    public function setCidade($cidade)
    {
        $this->cidade = $cidade;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDataPedal()
    {
        return $this->dataPedal;
    }

    /**
     * @param \DateTime $dataPedal
     * @return Agendamento
     */
    public function setDataPedal($dataPedal)
    {
        $this->dataPedal = $dataPedal;

        return $this;
    }

    /**
     * @return string
     */
    public function getHoraPedal()
    {
        return $this->horaPedal;
    }

    /**
     * @param string $horaPedal
     * @return Agendamento
     */
    public function setHoraPedal($horaPedal)
    {
        $this->horaPedal = $horaPedal;

        return $this;
    }

    /**
     * @return string
     */
    public function getLocalSaida()
    {
        return $this->localSaida;
    }

    /**
     * @param string $localSaida
     * @return Agendamento
     */
    public function setLocalSaida($localSaida)
    {
        $this->localSaida = $localSaida;

        return $this;
    }

    /**
     * @return string
     */
    public function getLocalDestino()
    {
        return $this->localDestino;
    }

    /**
     * @param string $localDestino
     * @return Agendamento
     */
    public function setLocalDestino($localDestino)
    {
        $this->localDestino = $localDestino;

        return $this;
    }
}

