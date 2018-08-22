<?php
/**
 * Created by PhpStorm.
 * User: phper
 * Date: 2018/7/9
 * Time: 10:33
 */

/*
 * php截取指定两个字符之间字符串
 * */
function get_between($input, $start, $end)
{
    $substr = substr($input, strlen($start) + strpos($input, $start), (strlen($input) - strpos($input, $end)) * (-1));

    return $substr;

}