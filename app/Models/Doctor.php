<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Astrotomic\Translatable\Contracts\Translatable as ContractsTranslatable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Doctor extends Model implements ContractsTranslatable
{
    use HasFactory, SoftDeletes, Translatable;

    public $translatedAttributes = ['name', 'appointments'];

    protected $dates = ['deleted_at'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
        'phone',
        'price',
        'section_id',
        'email_verified_at',
        'remember_token',
        'name',
        'appointments'
    ];

    protected $table = 'doctors';

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Get the doctor's image.
     */
    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    /**
     * Get the doctor's section.
     */
    public function section(): BelongsTo
    {
        return $this->BelongsTo(Section::class);
    }
}
