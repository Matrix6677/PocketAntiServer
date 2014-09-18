<?php

/**
 * 优雅的打印数组
 * @param array $array 需要打印的数组
 */
function p($array)
{
    dump($array, 1, '<pre>', 0);
}

/**
 * 将数组转为JSON数据格式，支持中文
 * @param array $arr 要处理的数组
 * @return string JSON格式的数据 
 */
function encode_json($arr)
{
    return urldecode(json_encode(url_encode($arr)));
}

function url_encode($str)
{
    if (is_array($str)) {
        foreach ($str as $key => $value) {
            $str[urlencode($key)] = url_encode($value);
        }
    } else {
        $str = urlencode($str);
    }
    return $str;
}