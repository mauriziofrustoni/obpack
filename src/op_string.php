<?php


namespace openbox\ObPack;


class op_string
{
    /**
     * Recupera la parte iniziale di un testo.
     * @param string $text
     * @param int $len
     * @return false|string
     */
    public static function left($text = '', $len = 0)
    {
        if (($len <= 0) || ($text === '')) {
            return '';
        }

        return substr($text, 0, $len);
    }

    /**
     * Recupera la parte finale di un testo.
     * @param string $text
     * @param int $len
     * @return false|string
     */
    public static function right($text = '', $len = 0)
    {
        if (($len <= 0) || ($text === '')) {
            return '';
        }

        return substr($text, -$len);
    }

    /**
     * Verifica se un testo ($text) inizia esattamente con la stringa indicata ($string).
     * @param string $text
     * @param string $string
     * @param bool $caseSensitive
     * @return bool
     */
    public static function startAs($text = '', $string = '', $caseSensitive = false)
    {
        $stringLen = strlen($string);

        if ($stringLen > 0) {
            if ($caseSensitive === false) {
                $string = strtoupper($string);
                $text = strtoupper($text);
            }

            return self::left($text, $stringLen) === $string;
        }

        return false;
    }

    /**
     * Verifica se un testo ($text) termina esattamente con la stringa indicata ($string).
     * @param string $text
     * @param string $string
     * @param bool $caseSensitive
     * @return bool
     */
    public static function endAs($text = '', $string = '', $caseSensitive = false)
    {
        $stringLen = strlen($string);

        if ($stringLen > 0) {
            if ($caseSensitive === false) {
                $string = strtoupper($string);
                $text = strtoupper($text);
            }

            return (self::right($text, $stringLen) === $string);
        }

        return false;
    }

    /**
     * Toglie ricorsivamente una stringa dall'inizio di una testo
     * @param string $text
     * @param string $string
     * @param boolean $caseSensitive
     * @return string
     */
    public static function removeLeadingString($text = '', $string = ' ', $caseSensitive = false)
    {
        if ((trim($text) === '') || (trim($string) === '')) {
            return $text;
        }

        $lenght = strlen($string);

        while (self::startAs($text, $string, $caseSensitive)) {
            $text = substr($text, $lenght);
        }

        return $text;
    }

    /**
     * Toglie ricorsivamente una stringa dalla fine di una testo
     * @param string $text
     * @param string $string
     * @param boolean $caseSensitive
     * @return string
     */
    public static function removeFinalString($text = '', $string = ' ', $caseSensitive = false)
    {
        if ((trim($text) === '') || (trim($string) === '')) {
            return $text;
        }

        $lenght = strlen($string);

        while (self::endAs($text, $string, $caseSensitive)) {
            $text = substr($text, 0, strlen($text) - $lenght);
        }

        return $text;
    }

    /**
     * Toglie gli ultimi n caratteri da una stringa
     * @param string $string
     * @param int $count
     * @return string
     */
    public static function removeLastChars($string = '', $count = 1)
    {
        if (trim($string) === '') {
            return '';
        }

        return substr($string, 0, strlen($string) - $count);
    }

    /**
     * Toglie i primi n caratteri da una stringa
     * @param string $string
     * @param int $count
     * @return string
     */
    public static function removeFirstChars($string = '', $count = 1)
    {
        if (trim($string) === '') {
            return '';
        }

        return substr($string, $count);
    }

    /**
     * Converte un valore boolean in una stringa
     * @param bool $value
     * @param string $trueString
     * @param string $falseString
     * @return string
     */
    public static function booleanToString($value = true, $trueString = 'y', $falseString = 'n')
    {
        $ret = $trueString;

        if (value === false) {
            $ret = $falseString;
        }

        return $ret;
    }

    /**
     * Converte un valore boolean in 0 o 1
     * @param bool $value
     * @return int
     */
    public static function booleanToInt($value = true)
    {
        $ret = 1;

        if ($value === false) {
            $ret = 0;
        }

        return $ret;
    }

    /**
     * Converte una valore stringa in booleano
     * @param string $value
     * @param string $falseValue
     * @param bool $caseSensitive
     * @return bool
     */
    public static function stringToBoolean($value = 'y', $falseValue = 'n', $caseSensitive = false)
    {
        if (!$caseSensitive) {
            $value = strtoupper($value);
            $falseValue = strtoupper($falseValue);
        }

        return ($value !== $falseValue);
    }

    /**
     * Converte un valore intero in booleano
     * @param int $value
     * @return bool
     */
    public static function intToBoolean($value = 1)
    {
        return ((int)$value !== 0);
    }

    /**
     * Controlla se tutti i caratteri di una stringa appartengono all'insieme definito nell'array $chars.
     * @param string $text
     * @param array $chars
     * @param bool $caseSensitive
     * @return bool
     */
    public static function checkChars($text = '', $chars = array(), $caseSensitive = true)
    {
        if ($text !== '') {
            if ($caseSensitive === false) {
                $text = strtoupper($text);
                $chars = op_array::toUpper($chars);
            }

            $findError = false;
            $count = strlen($text);
            $index = 0;

            while (($index < $count) && ($findError === false)) {
                if (in_array($text[$index], $chars) === false) {
                    $findError = true;
                }

                $index++;
            }

            return (!$findError);
        }

        return false;
    }

    /**
     * Verifica se una stringa contiene solo numeri.
     * @param $text
     * @return bool
     */
    public static function onlyNumbers($text)
    {
        return self::checkChars($text, array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9'), false);
    }
}