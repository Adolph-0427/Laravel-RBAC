<?php

namespace App\Http\Controllers\Back;

use App\Mail\Email;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;

class MailController extends Controller
{

    const mailAccount = 'wujianhua0427@qq.com';//邮件账户
    const mailPasswd = 'vnqfkzubqpvnbjha';//邮件密码
    const mailAddress = 'wujianhua0427@qq.com';//邮件地址
    const mailServer = 'imap.qq.com';//邮件服务器
    const serverType = 'pop3';//服务器类型
    const port = '110';//端口号
    protected $savePath;//附件存储地址
    protected $webPath;//网页地址


    public function receive()
    {
        $re = $this->pop3_login(self::mailServer, self::port, self::mailAddress, self::mailPasswd);
        dd($re);
    }

    public function pop3_login($host, $port, $user, $pass, $folder = "INBOX", $ssl = false)
    {
        $ssl = ($ssl == false) ? "/novalidate-cert" : "";
        return (@imap_open("{" . "$host:$port/pop3$ssl" . "}$folder", $user, $pass));
    }


    /**
     * 发送邮件
     */
    public function send()
    {
        Mail::to('522025327@qq.com')->send(new Email());
    }

}
