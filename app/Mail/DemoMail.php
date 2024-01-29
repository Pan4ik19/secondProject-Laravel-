<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DemoMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    private $name;

    private $userEntries;

    public function __construct(string $name, $userEntries)
    {
        $this->name = $name;
        $this->userEntries = $userEntries;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.mail')
                    ->with([
                        'name'=>$this->name,
                        'entries'=>$this->userEntries
                    ]);
    }
}
