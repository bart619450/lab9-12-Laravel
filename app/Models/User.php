<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
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
    public function filmy()
    {
        return $this->hasMany(Film::class);
    }

    public function autorzy()
    {
        return $this->hasMany(Autor::class);
    }

    public function aktorzy()
    {
        return $this->hasMany(Aktor::class);
    }

    public function typyfilmow()
    {
        return $this->hasMany(TypFilmu::class);
    }
    public function roleRequest()
    {
        return $this->hasOne(RoleRequest::class);
    }
    public function hasRole($role)
    {
        return $this->role === $role;
    }
}
