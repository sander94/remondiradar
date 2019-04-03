<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class PriceRequests extends Model
{
    protected $table = 'price_requests';
    protected $fillable = ['make', 'model', 'year', 'engine', 'kw', 'gearbox', 'fuel', 'additional_info', 'name', 'email', 'phone', 'region'];

// if this pricerequest has a row in pricerequestsansers table called request_id, then fuck yeah!
    public function answer() {
    	return $this->hasOne('App\PriceRequestsAnswers', 'request_id')->where('answered_by', Auth::user()->id);
    }



}
