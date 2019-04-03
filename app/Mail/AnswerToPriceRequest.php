<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use App\User;

class AnswerToPriceRequest extends Mailable
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
  
        $user = auth()->user();

        $wr_info = "<p style=\"font-family: 'Arial';\">".$request->answer."</p>";
        $wr_info .= "<br>";
        $wr_info .= "<hr>";
        $wr_info .= "<p style=\"font-family: 'Arial';\">Ettevõtte töökojad sinu piirkonnas: </p><ul>";

        foreach($user->workrooms as $usr_wr) {
            $wr_info .= "<li><a style=\"color: #559be8; font-family: 'Arial'; text-decoration: none; font-size: 14px; line-height: 19px;\" href=\"https://remondiradar.ee/show/".$usr_wr->id."\">".$usr_wr->brand_name."</a></li>";
            $wr_info .= "";
        }
        $wr_info .= "</ul>";

        return $this->view('emails.AnswerToPriceRequest')->with('wr_info', $wr_info);
    }
}
