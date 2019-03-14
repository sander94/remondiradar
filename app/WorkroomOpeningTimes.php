<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkroomOpeningTimes extends Model
{
    protected $table = 'wr_opening_times';
    protected $fillable = ['workroom_id', 'mon_from', 'mon_to', 'tue_from', 'tue_to', 'wed_from', 'wed_to', 'thu_from', 'thu_to', 'fri_from', 'fri_to', 'sat_from', 'sat_to', 'sun_from', 'sun_to', 'additional_openingtimes_info'];
}
