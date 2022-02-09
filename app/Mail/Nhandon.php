<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Nhandon extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
           //dd(config('mail.mailers.smtp'));
           $this->subject = "Thông báo đã nhận hàng CTU TECH ";
           $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->subject)->replyTo('phamquoctuanezg@gmail.com', 'Pham Tuan')->view('emails.nhan',[
            'data' => $this->data
        ]);
    }
}
