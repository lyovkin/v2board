<?php

/**
 * Return string with the first capital letter
 *
 * @param $string
 * @return string
 */
function upperFirstLetter($string) {
    $fc = mb_strtoupper(mb_substr($string, 0, 1));
    return $fc.mb_substr($string, 1);
}