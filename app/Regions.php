<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Regions extends Model
{
    public function scopeDefault($query)
    {
        return $query->where('is_default', true);
    }

    public function workrooms()
    {
        return $this->hasMany(Workroom::class, 'region');
    }
}
