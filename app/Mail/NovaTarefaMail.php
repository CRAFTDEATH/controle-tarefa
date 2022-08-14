<?php

namespace App\Mail;

use App\Models\Tarefa;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NovaTarefaMail extends Mailable
{
    use Queueable, SerializesModels;

    public Tarefa $tarefa;
    public $url;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Tarefa $tarefa)
    {
        $this->tarefa = $tarefa;
        $this->url =  env('APP_URL').'/tarefa'.'/'.$this->tarefa->id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.nova-tarefa')
        ->subject('Nova tarefa criada');
    }
}
