<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Photo extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable =[
        'path'
    ];

    public function photoable(): MorphTo
    {
        return $this->morphTo();
    }

    public function getPathAttribute($value)
    {
        return asset("images/{$value}");
    }
}
