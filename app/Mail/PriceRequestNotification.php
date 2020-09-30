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
        pakkuge palun hind ja esimene vaba aeg töö teostamiseks.
        

        <strong>Probleem: </strong>".$request->additional_info."

        <strong>Auto andmed </strong>
        <strong>Nr märk: </strong>".$request->reg_no."
        <strong>Mark ja mudel: </strong> ".$request->make." ".$request->model."
        <strong>Aasta: </strong>".$request->year."
        <strong>Mootor: </strong>".$request->fuel.", ".$request->engine." ".$request->kw." kW
        <strong>Käigukast: </strong>".$request->gearbox."
        <strong>Aasta: </strong>".$request->year."

        <strong>Saatja: </strong>".$request->name.", tel: ".$request->phone.", email: ".$request->email."<br>
        Päringule vastamiseks sisene: <a href=\"https://remondiradar.ee/admin/\">https://remondiradar.ee/admin/</a>

        Parimat
        Remondiradari meeskond</p><hr><p style=\"font-size: 12px; color: #adadad; font-family: 'Arial';\">Kui te ei soovi hinnapakkumiste kohta meiliteateid, saate need välja lülitada oma konto lehelt.</p>";

 

        return $this->view('emails.PriceRequestNotificationToUsers')->with('wr_info', $wr_info);
    }
}
