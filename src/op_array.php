<?php


namespace openbox\ObPack;


class op_array
{
    /**
     * Converte i valori di un array in minuscolo (gli indici non vengono toccati).
     * @param array $array
     * @return array
     */
    public static function toLower($array = array())
    {
        $out = array();

        foreach ($array as $id => $value) {
            $out[$id] = strtolower($value);
        }

        return $out;
    }

    /**
     * Converte i valori di un array in maiuscolo (gli indici non vengono toccati).
     * @param array $array
     * @return array
     */
    public static function toUpper($array = array())
    {
        $out = array();

        foreach ($array as $id => $value) {
            $out[$id] = strtoupper($value);
        }

        return $out;
    }
}