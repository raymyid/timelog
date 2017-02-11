<?php

if (!function_exists('uuid_encode')) {
    function uuid_encode($data) {
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

if (!function_exists('uuid_decode')) {
    function uuid_decode($data) {
        return str_replace('-', '', $data);
    }
}

if (!function_exists('base64_encode2')) {
    function base64_encode2($data) {
        return rtrim(base64_encode($data), '=');
    }
}

if (!function_exists('base64_decode2')) {
    function base64_decode2($data) {
        return base64_decode(str_pad($data, strlen($data) % 4, '=', STR_PAD_RIGHT));
    }
}

if (!function_exists('base64_decode2_uuid')) {
    function base64_decode2_uuid($data) {
        $uuid_bin = base64_decode2($data);
        $uuid_hex = bin2hex($uuid_bin);
        return uuid_encode($uuid_hex);
    }
}
