<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Support\Facades\Auth;

class Mem extends Model
{
    use HasFactory;

    protected $table = 'memes';

    protected $fillable = [
        'title',
        'content',
        'category_id',
        'is_published'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class,'mem_tags');
    }

    public function photos(): MorphOne
    {
        return $this->MorphOne(Photo::class, 'photoable');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function favorited(): bool
    {
        return (bool) Favorite::where('user_id', Auth::id())
            ->where('mem_id', $this->id)
            ->first();
    }

    public function likes(): bool
    {
        return (bool) Like::where('user_id', Auth::id())
            ->where('mem_id', $this->id)
            ->first();
    }
}
