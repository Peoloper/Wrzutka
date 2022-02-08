<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemTag extends Model
{
    use HasFactory;

    protected $fillable = [
      'mem_id',
      'tag_id'
    ];
}
