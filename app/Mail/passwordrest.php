<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class passwordrest extends Mailable
{
    use Queueable, SerializesModels;

    public $userIdForResetPassword;
    public $username;

    /**
     * Create a new message instance.
     *
     * @param  $username
     * @param string $userIdForResetPassword
     */
    public function __construct( $username, $userIdForResetPassword)
    {
        $this->username = $username;
        $this->userIdForResetPassword = $userIdForResetPassword;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.new_password')
            ->subject('Password Reset Request');
    }
}
