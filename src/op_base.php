<?php


namespace openbox\ObPack;


class op_base
{
    /**
     * Restituisce $value se è definita, altrimenti $default.
     * @param mixed $value
     * @param mixed $default
     * @return mixed
     */
    public static function getValue($value, $default)
    {
        if (is_null($value) === true) {
            return $default;
        }

        return $value;
    }
}