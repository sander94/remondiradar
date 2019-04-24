<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use App\User;

class SendReviewRequestEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($token)
    {
      $this->token = $token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(Request $request)
    {
  
    $token = $this->token;
  

        $text = "<p style=\"font-family: 'Arial';\">
        Tere
        Remonditöökoda, mida külastasite, soovib Teie tagasisidet teenuse kvaliteedi kohta.
        Tagasiside täitmine võtab aega ühe minuti.

        Oleme väga tänulikud igasuguse tagasiside eest.
        Tagasiside saate anda siit: <a href=\"https://remondiradar.ee/tagasiside/".$token."\">https://remondiradar.ee/tagasiside/".$token."</a></p>";

 

        return $this->view('emails.SendReviewRequestEmail')->with('text', $text);
    }
}
