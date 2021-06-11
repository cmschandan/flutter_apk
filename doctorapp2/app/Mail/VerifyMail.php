<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Config;

class VerifyMail extends Mailable
{
    use Queueable, SerializesModels;

    public $emailParams;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($emailParams)
    {
        $this->emailParams = $emailParams;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('My HospitalNow', 'MyHospitalNow Team')
        ->view('emails.account-activation')
        ->with(
          [
            'emailParams' => $this->emailParams
          ]);
    }
}
