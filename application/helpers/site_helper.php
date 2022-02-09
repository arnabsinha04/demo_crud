<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}


/**
 * generatePassword
 *
 * auto generate password of a given length range
 *
 * @param int $min minimum length of generate password
 * 
 * @param int $max maximum length of generate password
 *
 * @return string
 */
    if (!function_exists('generatePassword')) 
    {

        function generatePassword($min = 6, $max = 18) {
            $arr = array('a', 'b', 'c', 'd', 'e', 'f',
                'g', 'h', 'i', 'j', 'k',
                'm', 'n', 'p', 'r', 's',
                't', 'u', 'v', 'x', 'y', 'z',
                'A', 'B', 'C', 'D', 'E', 'F',
                'G', 'H', 'J', 'K', 'L',
                'M', 'N', 'P', 'R', 'S',
                'T', 'U', 'V', 'X', 'Y', 'Z',
                '1', '2', '3', '4', '5', '6',
                '7', '8', '9');
            $str = "";
            $length = rand($min, $max);
            $array_count = count($arr) - 1;
            for ($i = 0; $i < $length; ++$i) {
                $index = rand(0, $array_count);
                $str .= $arr[$index];
            }
            return $str;
        }

    }

/**
 * generateEmployeeCode 
 *
 * 
 *
 
 */
    if (!function_exists('generateEmployeeCode')) 
    {

        function generateEmployeeCode($ranCar) {
            
            $year=date('Y');
            $date = new DateTime();
            //$str="WB/EMP/(".$year.")(".$ranCar.")(".rand(1,9).$date->format('His').")";
            $str="WB/EMP/".$year."".strtoupper($ranCar)."".rand(1,9).$date->format('His');

            return $str;
        }

    }


?>