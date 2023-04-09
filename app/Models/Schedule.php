<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Schedule extends Model
{
    use HasFactory;
    const MONDAY = 'Понедельник';
    const TUESDAY = 'Вторник';
    const WEDNESDAY = 'Среда';
    const THURSDAY = 'Четверг';
    const FRIDAY = 'Пятница';
    const SATURDAY = 'Суббота';
    const SUNDAY = 'Воскресенье';

    const ENUM_DAYS = [self::MONDAY, self::TUESDAY, self::WEDNESDAY,self::THURSDAY,self::FRIDAY,self::SATURDAY,self::SUNDAY];

    protected $fillable = ['group_id', 'day', 'start_time', 'end_time'];

    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }
}
