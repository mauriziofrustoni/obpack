<?php


namespace openbox\ObPack;


class op_string
{
    /**
     * Verifica se un testo ($text) termina esattamente con la stringa indicata ($string).
     * @param string $text
     * @param string $string
     * @return bool
     */
    public static function endAs($text, $string)
    {
        $text = op_base::getValue($text, '');
        $string = op_base::getValue($string, '');

        $stringLen = strlen($string);

        if ($stringLen > 0) {
            return substr($text, -$stringLen) === $string;
        }

        return false;
    }
}