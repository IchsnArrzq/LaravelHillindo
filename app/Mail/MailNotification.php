<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class MailNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $user;
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
        $user = $this->user;
        $qrcode = QrCode::size(400)->generate($user->email);
        return $this->from(env('MAIL_APP'))->view('mail.app')->with([
            'user' => $user->name,
            'qrcode' => $qrcode
        ])->subject('Hello');
    }
}
