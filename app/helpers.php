<?php

if (!function_exists('str_baseconvert')) {
    function str_baseconvert($str, $frombase=10, $tobase=36) {
        $str = trim($str);
        if (intval($frombase) != 10) {
            $len = strlen($str);
            $q = 0;
            for ($i=0; $i<$len; $i++) {
                $r = base_convert($str[$i], $frombase, 10);
                $q = bcadd(bcmul($q, $frombase), $r);
            }
        }
        else $q = $str;

        if (intval($tobase) != 10) {
            $s = '';
            while (bccomp($q, '0', 0) > 0) {
                $r = intval(bcmod($q, $tobase));
                $s = base_convert($r, 10, $tobase) . $s;
                $q = bcdiv($q, $tobase, 0);
            }
        }
        else $s = $q;

        return $s;
    }
}

if (!function_exists('uuid_convert')) {
    function uuid_convert($value, $convert=false) {
        $ret = '';
        if (false === $convert) {
            $uuid = str_replace('-', '', $value);
            $ret = str_baseconvert($uuid, 16, 36);
        } else {
            $uuid = str_baseconvert($value, 36, 16);
            $s1 = substr($uuid, 0, 8);
            $s2 = substr($uuid, 8, 4);
            $s3 = substr($uuid, 12, 4);
            $s4 = substr($uuid, 16, 4);
            $s5 = substr($uuid, 20);

            $ret = implode('-', [$s1, $s2, $s3, $s4, $s5]);
        }
        return $ret;
    }
}
