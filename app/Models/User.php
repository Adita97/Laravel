<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Notifications\CustomResetPasswordNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'full_name',
        'email',
        'phone_number',
        'username',
        'password',
        'profile_avatar',
        'bio',
    ];
    
    protected $attributes = [
        'bio' => 'NO BIO ADDED', 
        'profile_avatar' => 'avatar.png'

    ];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'is_admin',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function comments():HasMany
    {
        return $this->hasMany(Comment::class);
    }
    public function bookings(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(bookings::class);
    }
    public function userLinks()
    {
        return $this->hasOne(UserLink::class);
    }
    public function userSkills()
    {
        return $this->hasMany(UserSkill::class);
    }

    public function sendPasswordResetNotification($token)
{
    $this->notify(new CustomResetPasswordNotification($token));
}

}
