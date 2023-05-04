<?php

namespace App\Mail;
use Illuminate\Http\UploadedFile;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MessageGoogle extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $data;
    public function __construct($data)
    {
        $this->data=$data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //return $this->view('view.name');
        return $this->from('andoajpr@gmail.com')
                    ->subject('Messsage SMTP')
                    ->view('email.message-google')->attach(storage_path('app/public/'.$this->data['fichier']),[
                        'mime' => 'application/pdf',
                        'as' =>  $this->data['fichier'],
                    ]);
    }
}
