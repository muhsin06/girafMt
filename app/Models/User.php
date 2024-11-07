<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Events\UserSaved;



class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'prefixname',
        'firstname',
        'middlename',
        'lastname',
        'suffixname',
        'username',
        'email',
        'password',
        'photo',  
        'type', 
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAvatarAttribute()
    {
        if ($this->photo && file_exists(public_path("images/users/{$this->photo}"))) {
            return asset("images/users/{$this->photo}");
        }
        return asset('assets/img/user-5.jpg');
    }

    public function getFullnameAttribute()
    {
        $first = $this->firstname ;
        $middle = $this->middlename ? substr($this->middlename, 0, 1) . '.' : ''; 
        $last = $this->lastname;

        return trim("{$first} {$middle} {$last}");

    }
    protected static function booted()
    {
        static::saved(function ($user) {
            // Trigger the UserSaved event when a user is saved
            event(new UserSaved($user));
        });
    }
    
}
