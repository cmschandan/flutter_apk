<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class Welcome extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        Log::info('Mail Build Function');
        return $this->from('info@scmgalaxy.com', 'My Hospital Now')
        ->subject($this->user->subject)
        ->view('emails.account-activation')
        ->cc('info@scmgalaxy.com')
        ->with(
          [
            'user' => $this->user
          ]);
    }
}
