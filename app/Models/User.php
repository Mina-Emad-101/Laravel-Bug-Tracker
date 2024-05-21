<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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

    public function assigned_bugs(): HasMany
    {
        return $this->hasMany(Bug::class, foreignKey: 'assigned_staff_id');
    }

    public function reported_bugs(): HasMany
    {
        return $this->hasMany(Bug::class, foreignKey: 'reporter_id');
    }

    public function received_messages(): HasMany
    {
        return $this->hasMany(Message::class, foreignKey: 'receiver_id');
    }

    public function sent_messages(): HasMany
    {
        return $this->hasMany(Message::class, foreignKey: 'sender_id');
    }
}
