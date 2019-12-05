<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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

    public function setPasswordAttribute($value)
    {
        // check if value is not empty
        if (!empty($value)) {

            // check if the value is already a hash (Regex: String begins with '$2y$##$' followed by at least 50 characters)
            if ( preg_match('/^\$2y\$[0-9]*\$.{50,}$/', $value) ) {
                // if it is so, set the attribute without hashing again
                $this->attributes['password'] = $value;
            }
            else {
                // else hash the password and set as attribute
                $this->attributes['password'] = bcrypt($value);
            }

            return true;
        }

        return false;
    }
}
