<?php
/**
 * Created by PhpStorm.
 * User: phper
 * Date: 2018/7/9
 * Time: 10:33
 */

/**
 * php截取指定两个字符之间字符串
 * */
function get_between($input, $start, $end)
{
    $substr = substr($input, strlen($start) + strpos($input, $start), (strlen($input) - strpos($input, $end)) * (-1));

    return $substr;
}

/**
 * 文章状态处理
 * @param  int $status 状态
 * return  string
 */
function articleStatus($status)
{
    switch ($status) {
        case 0;
            $result = '未发布';
            break;
        case 1;
            $result = '待审核';
            break;
        case 2;
            $result = '已发布';
            break;
    }

    return $result;
}

/**
 * 查询此用户是否添加该用户组
 * @param gid uid
 * return boolean
 */
function is_select_group($uid, $gid)
{

    return DB::table('user_relational_group')->where([['uid', '=', $uid], ['gid', '=', $gid]])->exists();
}