<?php

namespace App\Models;

use App\Models\User;
use App\Models\Like;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'parent_id', 'body'];

    /**
     * The relationships that should always be loaded
     * 
     * @var array
     */
    protected $with = ['user'];

    /**
     * The relationships that should always be loaded
     * 
     * @var array
     */
    protected $appends = [
        'liked', 'disliked'
    ];

    public function getLikedAttribute() {
        return $this->likes()->where('like',1)
            ->where('likeable_id', $this->id)
            ->where('likeable_type', get_class($this))
            ->count();
    }

    public function getDislikedAttribute() {
        return $this->likes()->where('dislike', 1)
            ->where('likeable_id', $this->id)
            ->where('likeable_type', get_class($this))
            ->count();
    }

    public function scopeAllPosts($query) {
        return $query->where('user_id', auth()->id())
        ->orWhereIn('user_id', auth()->user()->friends_ids());
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function likes() {
        return $this->morphMany(Like::class, 'likeable');
    }
}
