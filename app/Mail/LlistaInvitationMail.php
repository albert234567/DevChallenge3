<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Llista;

class LlistaInvitationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $llista;

    public function __construct(Llista $llista)
    {
        $this->llista = $llista;
    }

    public function build()
    {
        return $this->view('emails.llista_invitation')
                    ->subject("Invitació a la Llista: {$this->llista->name}");
    }
}
