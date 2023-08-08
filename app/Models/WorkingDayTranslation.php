<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkingDayTranslation extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['working_day_name'];
}
