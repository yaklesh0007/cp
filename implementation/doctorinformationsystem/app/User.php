<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role_id','city','location','image','qualification','specialistat',
        'aboutu','phone',
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

    

    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function feedbacks()
    {
        return $this->hasMany('App\Feedback');
    }

    public function sliders()
    {
        return $this->hasMany('App\Slider');
    }

    public function rates()
    {
        return $this->hasMany('App\Rate');
    }
    
    
    public function avgRating()
    {
        return $this->rates->avg('rating');
    }

    public function messages()
    {
        return $this->hasMany('App\Message');
    }
}
