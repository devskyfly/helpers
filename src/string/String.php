<?php
namespace devskyfly\helpers\string;

class String
{
    /**
     * Return word for current number
     * например array('яблоко', 'яблока', 'яблок')
     * @param int $nubmber.
     * @param [] $words - words for (1,4,5) numbers.
     * @throws \Exception
     * @return String
     */
    public static function getWordForNumber($number, $words)
    {
        if(!is_integer($number)){
            throw new \Exception('$number param is not integer');
        }
        if(!is_array($words)){
            throw new \Exception('$words param is not array');
        }
        $number = $number % 100;
        if ($number>=11 && $number<=19) {
            $ending=$words[2];
        }
        else {
            $i = $number % 10;
            switch ($i)
            {
                case (1): $ending = $words[0]; break;
                case (2):
                case (3):
                case (4): $ending = $words[1]; break;
                default: $ending=$words[2];
            }
        }
        return $ending;
    }
}