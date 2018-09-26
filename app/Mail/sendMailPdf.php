<?php

namespace Siac\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use Auth;

class sendMailPdf extends Mailable
{
    use Queueable, SerializesModels;

    public $registerActivity;
    public $subject;
    public $pdf;
    public $namePdf;

    public function __construct($registerActivity, $pdf)
    {
        $this->registerActivity = $registerActivity;
        $this->subject = "Informe de registro de actividad";
        $this->pdf = $pdf;
        $this->namePdf = $registerActivity[0]->codActivity;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.view')
                    ->attachData($this->pdf->output(), "informe_actividad_".$this->namePdf.".pdf", [
                        'mime' => 'application/pdf',
                    ])
                    ->subject($this->subject)
                    ->from('contacto@sipcom.cl', 'SIPCOM, Soluciones Tecnologicas');
    }
}
