<?php

namespace App\Models;

use CyrildeWit\EloquentViewable\Viewable;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Advertisement extends Model implements HasMedia
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
}
