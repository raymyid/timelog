<?php

if (!function_exists('uuid_hexToString')) {
    function uuid_hexToString($data) {
        $ret = '';
        if (strlen($data) === 32) {
            $s1 = substr($data, 0, 8);
            $s2 = substr($data, 8, 4);
            $s3 = substr($data, 12, 4);
            $s4 = substr($data, 16, 4);
            $s5 = substr($data, 20);

            $ret = implode('-', [$s1, $s2, $s3, $s4, $s5]);
        }
        return $ret;
    }
}

if (!function_exists('uuid_stringtohex')) {
    function uuid_stringToHex($data) {
        return str_replace('-', '', $data);
    }
}

use \Carbon\Carbon;
if (!function_exists('carbon_diff')) {
    function carbon_diff($data) {
        Carbon::setLocale('zh');
        $dt = Carbon::parse($data);
        return $dt->diffForHumans();
    }
}
