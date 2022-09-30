<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Mailer extends Mailable
{
    use Queueable, SerializesModels;
    public $subject;
    public $details;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject, $details)
    {
        //
        $this->subject = $subject; 
        $this->details = $details; 
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->subject)->view('email.Mailer')->attachData($this->details['image'], $this->details["imageName"]);
    }
}
