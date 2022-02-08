<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment',
        'mem_id',
    ];

    protected $casts = [
        'created_at' => 'datetime:d-m-Y',
    ];

    public function mem()
    {
        return $this->belongsTo(Mem::Class);
    }

    public function user()
    {
        return $this->belongsTo(User::Class);
    }
}
