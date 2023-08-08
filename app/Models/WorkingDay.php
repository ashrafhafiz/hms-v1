<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as ContractsTranslatable;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class WorkingDay extends Model implements ContractsTranslatable
{
    use HasFactory, Translatable;

    public $translatedAttributes = ['working_day_name'];

    protected $fillable = ['en', 'ar'];

    public function doctors(): BelongsToMany
    {
        return $this->belongsToMany(Doctor::class,'doctor_working_day','working_day_id', 'doctor_id')->withTimestamps();
    }
}
