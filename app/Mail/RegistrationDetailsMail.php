<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegistrationDetailsMail extends Mailable
{
    use Queueable, SerializesModels;

    public $registrationDetails;

    public function __construct($registrationDetails)
    {
        $this->registrationDetails = $registrationDetails;
    }

    public function build()
    {
        return $this->subject('Registration Details')
                    ->view('emails.registration_details')
                    ->with(['registrationDetails' => $this->registrationDetails]);
    }
}
