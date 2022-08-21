<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use phpDocumentor\Reflection\Types\This;

class SendCF extends Mailable
{
    use Queueable, SerializesModels;
    public $dataform;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($dataform)
    {
        $this->dataform = $dataform;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('email.contactform')
                    ->subject('A Company Requesting Support')
                    ->attach($this->dataform['screenshot']->getRealPath(),[
                        'as' => $this->dataform['screenshot']->getClientOriginalName()
                    
                    ]);
    }
}
