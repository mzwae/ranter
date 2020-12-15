<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;

trait Likeable
{
    public function scopeWithLikes(Builder $query)
    {
        $query->leftJoinSub(
            'select rant_id, sum(liked) likes, sum(!liked) dislikes from likes group by rant_id',
            'likes',
            'likes.rant_id',
            'rants.id'
        );
    }
    public function isDislikedBy(User $user)
    {
        return (bool) $user->likes
        ->where('rant_id', $this->id)
        ->where('liked', false)
        ->count();
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function isLikedBy(User $user)
    {
        return (bool) $user->likes
        ->where('rant_id', $this->id)
        ->where('liked', true)
        ->count();
    }

    public function dislike($user = null)
    {
        return $this->like($user, false);
    }

    public function like($user = null, $liked = true)
    {
        $this->likes()->updateOrCreate(
            [
                'user_id' => $user ? $user->id : auth()->id(),
            ],
            [
                'liked' => $liked,
            ]
        );
    }

}
