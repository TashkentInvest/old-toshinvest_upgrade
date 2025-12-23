<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VacancyApplicationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $applicationData;

    /**
     * Create a new message instance.
     */
    public function __construct(array $applicationData)
    {
        $this->applicationData = $applicationData;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        $mail = $this->subject('Yangi ish uchun ariza: ' . $this->applicationData['position'])
            ->from($this->applicationData['email'], $this->applicationData['full_name'])
            ->replyTo($this->applicationData['email'], $this->applicationData['full_name'])
            ->view('emails.vacancy_application');

        // Attach resume if provided
        if (isset($this->applicationData['resume_path']) && $this->applicationData['resume_path']) {
            $mail->attach(storage_path('app/public/' . $this->applicationData['resume_path']), [
                'as' => 'Resume_' . $this->applicationData['full_name'] . '.' . pathinfo($this->applicationData['resume_path'], PATHINFO_EXTENSION),
            ]);
        }

        return $mail;
    }
}
