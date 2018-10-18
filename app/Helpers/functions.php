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

/**
 * 查询用户是否添加该角色
 * @param rid uid
 * return boolean
 */
function is_select_role($uid, $rid)
{
    return DB::table('user_relational_role')->where([['uid', '=', $uid], ['rid', '=', $rid]])->exists();

}

/**
 * 查询用户组是否添加该角色
 * @param rid gid
 * return boolean
 */
function is_group_select_role($gid, $rid)
{
    return DB::table('role_relational_group')->where([['rid', '=', $rid], ['gid', '=', $gid]])->exists();

}


/**
 * 递归
 */
function recursion($list = [], $pid = 0)
{
    $array = [];
    foreach ($list as $value) {
        if ($value->pid == $pid) {
            $value->child = recursion($list, $value->pid);
            $array[] = $value;
        }
    }
    return $array;
}

/**
 * 对象转数组
 * @param $object 对象集合
 */
function objectToArray($object)
{
    //先编码成json字符串，再解码成数组
    return json_decode(json_encode($object), true);
}

/**
 * API 接口返回
 * @param $code int 状态码
 * @param $message string 返回信息
 * @param $data array 返回数据
 * @param $url string 要跳转的URL
 * return array
 */
function ajaxReturn($code, $message, $data = array(), $url = '/')
{
    if (!is_numeric($code)) {
        return 'code 为数字';
    }

    $result = [
        'code' => $code,
        'message' => $message,
        'data' => $data,
        'url' => $url,
    ];
    header('Content-Type:application/json; charset=utf-8');

    return json_encode($result);
}

/**
 * 查询单个字段
 * @param $table 表名称
 * @param $whereFild 查询条件字段
 * @param $whereValue 查询条件值
 * @param $field 要查询的字段
 */
function getOne($table, $whereField, $whereValue, $field)
{
    return DB::table($table)->where($whereField, '=', $whereValue)->value($field);
}
