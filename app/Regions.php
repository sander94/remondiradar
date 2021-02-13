<?php

namespace App;

use App\Models\Advertisement;
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

    public function advertisements()
    {
        return $this->hasMany(Advertisement::class, 'region_id');
    }

    public function activeAdvertisements()
    {
        return $this->advertisements()->where('is_active', true);
    }

}
