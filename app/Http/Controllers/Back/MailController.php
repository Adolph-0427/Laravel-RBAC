<?php

namespace App\Http\Controllers\Back;

use App\Mail\Email;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;

class MailController extends Controller
{
    /**
     * 发送邮件
     */
    public function send()
    {
        Mail::to('522025327@qq.com')->send(new Email());
    }

}
