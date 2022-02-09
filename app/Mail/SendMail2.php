<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail2 extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
         //dd(config('mail.mailers.smtp'));
        $this->subject = "Thông báo sửa chữa/bảo hành tại CTU TECH ";
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->subject)->replyTo('phamquoctuanezg@gmail.com', 'Pham Tuan')->view('emails.send_mails2',[
            'data' => $this->data
        ]);

    }
}
