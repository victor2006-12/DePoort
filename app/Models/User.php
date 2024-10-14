<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * Aangepaste primaire sleutel.
     *
     * @var string
     */
    protected $primaryKey = 'gebruikers_id';

    /**
     * Als de primaire sleutel geen auto-increment is.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * Het type van de primaire sleutel.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'gebruikers_id',
        'foto',
        'voornaam',
        'tussenvoegsel',
        'achternaam',
        'adres',
        'postcode',
        'woonplaats',
        'land',
        'email',
        'password',
        'geactiveerd',
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
}
