<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment',
        'mem_id',
        'user_id'
    ];

    protected $casts = [
        'created_at' => 'datetime:d-m-Y',
    ];

    public function mem(): BelongsTo
    {
        return $this->belongsTo(Mem::Class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::Class);
    }
}
