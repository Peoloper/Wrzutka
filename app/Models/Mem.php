<?php

namespace App\Models;

use App\Http\Traits\CacheClear;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Mem extends Model
{
    use HasFactory;


    protected $table = 'memes';

    const UPDATED_AT = null;

    protected $fillable = [
        'title',
        'content',
        'category_id',
        'is_published',
        'like',
        'date_added',
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

    public function favorites(): HasMany
    {
        return $this->hasMany(Favorite::class);
    }

    public function favorite()
    {
        return $this->favorites()->where('user_id', auth()->id());
    }

    public function likes(): HasMany
    {
        return $this->hasMany(Like::class);
    }

    public function liked()
    {
        return $this->likes()->where('user_id', auth()->id());
    }
}
