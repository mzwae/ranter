<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable, Followable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'username', 'bio'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function getAvatarAttribute()
    {
        return "https://i.pravatar.cc/200?u=" . $this->email;
    }


    /**
     * Include all of the user's rants
     * including the rants of everyone they follow,
     * in descending order
     */
    public function timeline()
    {
        $friends = $this->follows()->pluck('id');

        return Rant::whereIn('user_id', $friends)
        ->orWhere('user_id', $this->id)
        ->withLikes()
        ->latest()
        ->paginate(10);
    }

    public function rants()
    {
        return $this->hasMany(Rant::class);
    }

    public function path($append = '')
    {
        $path = route('profile', $this->username);

        return $append ?  "{$path}/{$append}" : $path;
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    // public function bio()
    // {
    //     return $this->hasOne(Bio::class);
    // }

    public function updateOrCreateBio($user = null, $bio)
    {
        $this->bio()->updateOrCreate(
            [
                'user_id' => $user ? $user->id : auth()->id(),
            ],
            [
                'body' => $bio,
            ]
        );
    }
}
