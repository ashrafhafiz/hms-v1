<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as ContractsTranslatable;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Section extends Model implements ContractsTranslatable
{
    use HasFactory, SoftDeletes, Translatable;

    public $translatedAttributes = ['name', 'description'];

    protected $dates = ['deleted_at'];
    protected $fillable = ['en', 'ar'];

    /**
     * Get the section's doctors.
     */
    public function doctors(): HasMany
    {
        return $this->HasMany(Doctor::class);
    }
}
