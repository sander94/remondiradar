<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PriceRequestsAnswers extends Model
{
    protected $table = 'answered_price_requests';
    protected $fillable = ['request_id', 'answered_by', 'answer'];
}
