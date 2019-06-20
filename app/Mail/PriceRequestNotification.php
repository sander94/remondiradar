<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use App\User;

class PriceRequestNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(Request $request)
    {
  
       

        $wr_info = "<p style=\"font-family: 'Arial';\">Tere, 
        Teile saabus uus hinnapäring Remondiradarist!

        <strong>Auto: </strong>".$request->reg_no.", ".$request->make." ".$request->model." ".$request->year."
        <strong>Probleem: </strong>".$request->additional_info."<br>
        <strong>Kliendi kontakt: </strong>".$request->name.", tel: ".$request->phone.", email: ".$request->email."<br>
        Päringule vastamiseks sisene: <a href=\"https://remondiradar.ee/admin/\">https://remondiradar.ee/admin/</a>

        Parimat
        Remondiradari meeskond</p><hr><p style=\"font-size: 12px; color: #adadad; font-family: 'Arial';\">Kui te ei soovi hinnapakkumiste kohta meiliteateid, saate need välja lülitada oma kohto lehelt.</p>";

 

        return $this->view('emails.PriceRequestNotificationToUsers')->with('wr_info', $wr_info);
    }
}
