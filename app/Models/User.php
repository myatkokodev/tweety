<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable, Followable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [
    //     'username',
    //     'name',
    //     'email',
    //     'password',
    // ];

    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAvatarAttribute ($value) {
        // return asset('storage/' . $value ?: '/images/default-avatar.jpeg');
        if(isset($value)) {

            return asset('storage/' . $value );

        } else {

            return asset('images/default-avatar.jpeg');
        }
    }

    public function setPasswordAttribute ($value) {
        $this->attributes['password'] = Hash::make($value);
    }

    public function timeline () {
        // return Tweet::where('user_id', $this->id)->latest()->get();
        //include all of the user's tweets as well as of everyone that he followed

        $friends = $this->follows()->pluck('id');
        // $ids->push($this->id);

        return Tweet::whereIn('user_id', $friends)->orWhere('user_id', $this->id)->withLikes()->latest()->paginate(15);
    }


    public function tweets () {
        return $this->hasMany(Tweet::class)->latest();
    }

    public function likes () {
        return $this->hasMany(Like::class)->latest();
    }

    public function path ($append = '') {
        $path = route('profile', $this->username);

        return $append ? "{$path}/{$append}" : $path;
    }



}
