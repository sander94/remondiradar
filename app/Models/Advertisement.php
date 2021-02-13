<?php

namespace App\Models;

use App\Regions;
use CyrildeWit\EloquentViewable\Viewable;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Advertisement extends Model implements HasMedia, \CyrildeWit\EloquentViewable\Contracts\Viewable
{
    use Viewable, HasMediaTrait;

    protected $fillable = [
        'title',
        'started_at',
        'ended_at',
        'url',
        'is_active'
    ];


    public function registerMediaCollections()
    {
        $this->addMediaCollection('image')
            ->singleFile();
    }

    public function region()
    {
        return $this->belongsTo(Regions::class, 'region_id');
    }
}
