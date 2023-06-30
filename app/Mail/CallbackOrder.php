<?php

namespace App\Mail;

use App\Models\Lead;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CallbackOrder extends Mailable
{
    use Queueable, SerializesModels;

    private $lead;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($lead)
    {
        $this->lead = $lead;
    }

    /**
     * @return \App\Mail\CallbackOrder
     */
    public function build() : CallbackOrder
    {
        return $this->view('emails.orders.callbackOrder')->with([
            "lead" => $this->lead,
            "post_link" => $_SERVER['SERVER_NAME']."/posts/".$this->lead->id,
        ]);
    }
}
