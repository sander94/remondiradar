<?php

namespace App;

use App\Enums\DayOfWeekEnum;
use App\Enums\OpenTypeEnum;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Konekt\Enum\Eloquent\CastsEnums;

class Timeslot extends Model
{
    use CastsEnums;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'time',
        'from',
        'to',
        'day_of_week',
        'open_type',
    ];

    /**
     * Cast attribute to Enum class
     *
     * @var array
     */
    protected $enums = [
        'day_of_week' => DayOfWeekEnum::class,
        'open_type'   => OpenTypeEnum::class,
    ];

    /**
     * Guarded attributes.
     *
     * @var array
     */
    protected $guarded = [
        'id',
        'created_at',
    ];

    /**
     * Date casts.
     *
     * @var array
     */
    protected $dates = [
        'updated_at',
        'created_at',
    ];

    /**
     * Appends to JSON.
     *
     * @var array
     */
    protected $appends = [
        //
    ];

    public function workroom()
    {
        return $this->belongsTo(Workroom::class);
    }

    public function getFromAttribute($value)
    {
        return Carbon::parse($value)->format('H:i');
    }

    public function getToAttribute($value)
    {
        return Carbon::parse($value)->format('H:i');
    }
}

