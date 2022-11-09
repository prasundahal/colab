<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserRegistrationMail extends Mailable
{
    use Queueable, SerializesModels;
    public $details;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    
    public function __construct($details) {
        $this->details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $details = json_decode($this->details, true);
        $subject = $details['subject'];
        

        return $this->from('noorgames@gmail.com', $details['title'])
                    ->subject($subject)
                    ->markdown('mails.customMail')
                    ->with([
                        'details' => (!empty($details) ? $details : '') 
                        ]);
    }
}
