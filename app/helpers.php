<?php

if (!function_exists('uuid_convert')) {
    function uuid_convert($value, $convert=false) {
        $ret = '';
        if (false === $convert) {
            $ret = str_replace('-', '', $value);
        } else {
            $s1 = substr($value, 0, 8);
            $s2 = substr($value, 8, 4);
            $s3 = substr($value, 12, 4);
            $s4 = substr($value, 16, 4);
            $s5 = substr($value, 20);

            $ret = implode('-', [$s1, $s2, $s3, $s4, $s5]);
        }
        return $ret;
    }
}
