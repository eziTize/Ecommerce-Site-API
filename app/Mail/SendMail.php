<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMail extends Mailable
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
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = $this->data['subject'];
        if(isset($this->data['from_address']) && !empty($this->data['from_address'])){
            $address = $this->data['from_address'];
        }else{
            $address = env('MAIL_FROM_ADDRESS');
        }

        if(isset($this->data['from_name']) && !empty($this->data['from_name'])){
            $name = $this->data['from_name'];
        }else{
            $name = env('MAIL_FROM_NAME');
        }

        return $this->view('mail')->subject($subject)->from($address, $name);
    }
}
