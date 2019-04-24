<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkroomOpeningTimes extends Model
{
    protected $table = 'wr_opening_times';

    protected $fillable = [
        'wr_id',
        'additional_openingtimes_info',
    ];

    public function workroom()
    {
        return $this->hasOne('\App\Workrooms', 'wr_id');
    }

    public function timeslots()
    {
        return $this->hasMany(Timeslot::class, 'opening_time_id');
    }

    //public function getMonFromAttribute()
    //{
    //    return Timeslots::find($this->attributes['mon_from']);
    //}
    /*
    public function getMonToAttribute()
        {
            return Timeslots::find($this->attributes['mon_from']);

        }

    public function getMonOptAttribute()
        {
            return Timeslots::find($this->attributes['mon_from']);

        } */
    /*
    public function getMonFromAttribute()
        {
            return Timeslots::find($this->attributes['mon_from']);

        }

    public function getMonFromAttribute()
        {
            return Timeslots::find($this->attributes['mon_from']);

        }

    public function getMonFromAttribute()
        {
            return Timeslots::find($this->attributes['mon_from']);

        }

    public function getMonFromAttribute()
        {
            return Timeslots::find($this->attributes['mon_from']);

        }

    public function getMonFromAttribute()
        {
            return Timeslots::find($this->attributes['mon_from']);

        } */
}



