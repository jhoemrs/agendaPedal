<?php
namespace AgendaPedalBundle\Utils;

/**
 * Class UtilFormat
 * @package AgendaPedalBundle\Utils
 */
class UtilFormat
{
    /**
     * @param int|boolean $valor
     * @return string
     */
    public static function simNao($valor)
    {
        return $valor ? 'Sim' : 'Não';
    }

    /**
     * @param int|boolean $valor
     * @return string
     */
    public static function ativoInativo($valor)
    {
        return $valor ? 'Ativo' : 'Inativo';
    }

    /**
     * @param string $valor
     * @return \DateTime
     */
    public static function brToDate($valor)
    {
        $date = new \DateTime();
        $dateArray = explode('/', $valor);
        $date->setDate($dateArray[2], $dateArray[1], $dateArray[0]);
        $date->setTime(0, 0, 0);

        return $date;
    }

    /**
     * @param string $dataValor
     * @param string $time
     * @return \DateTime
     */
    public static function brToDateTime($dataValor, $time)
    {
        $date = new \DateTime();
        $dateArray = explode('/', $dataValor);
        $date->setDate($dateArray[2], $dateArray[1], $dateArray[0]);

        $time = explode(':', $time);
        $date->setTime($time[0], $time[1], ($time[2] ? $time[2] : 0));

        return $date;
    }

    /**
     * @param \DateTime $date
     * @return string
     */
    public static function dateToBr(\DateTime $date)
    {
        return $date->format('d/m/Y');
    }

    /**
     * @param string $valor
     * @return string
     */
    public static function dinheiroToDecimal($valor)
    {
        return preg_replace('@[.]$@', '', preg_replace('@0+$@', '', str_replace(',', '.', str_replace('.', '', $valor))));
    }

    /**
     * @param string $valor
     * @return string
     */
    public static function removerPontuacao($valor)
    {
        return preg_replace('@\D@', '', $valor);
    }
}