<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmplyAttendance extends Model
{
    protected $fillable = [
        'user_id', 'att_date', 'att_year', 'att_month', 'attendance', 'edit_date', 'hourly_attendance'
    ];
}
