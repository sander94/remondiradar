<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{


	public function workroom() {
		return $this->belongsTo('\App\Workroom');
	}
}
