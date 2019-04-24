<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkroomOpeningTimes extends Model
{
    protected $table = 'wr_opening_times';

    protected $fillable = [
        'wr_id',
        'mon_from',
        'mon_to',
        'tue_from',
        'tue_to',
        'wed_from',
        'wed_to',
        'thu_from',
        'thu_to',
        'fri_from',
        'fri_to',
        'sat_from',
        'sat_to',
        'sun_from',
        'sun_to',
        'mon_opt',
        'tue_opt',
        'wed_opt',
        'thu_opt',
        'fri_opt',
        'sat_opt',
        'sun_opt',
        'additional_openingtimes_info',
    ];

    public function workroom()
    {
        return $this->hasOne('\App\Workrooms', 'wr_id');
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



