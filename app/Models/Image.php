<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Image extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = ['file_url'];

    protected $table = 'images';

    /**
     * Get the parent imageable model (user or doctor).
     */
    public function imageable(): MorphTo
    {
        return $this->morphTo();
    }
}
