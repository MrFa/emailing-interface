<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Log;
use App\Helpers\StorageHelper;

class DigiPortalMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $data;
    public function __construct($data)
    {
        $this->data = $data;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(){
        return $this->markdown('emails.DigiPortalMail')
                    ->from($this->data['email'])
                    ->subject($this->data['subject'])
                    ->with('data',$this->data)
                    ->attach(storage_path('app/public/'.$this->data['document_path']),['mime'=>$this->data['mime_type']]);
    }
                    
}
