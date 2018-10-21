<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Email extends Mailable
{
    use Queueable, SerializesModels;


    public $SendInfo;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->SendInfo = [
            'title' => '测试标题',
            'text' => '测试内容'
        ];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('Email.send');
    }
}
