<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Foundation\Auth\User as Authenticatable;
    use Illuminate\Notifications\Notifiable;
    use Spatie\Permission\Traits\HasRoles;


    class User extends Authenticatable
    {
        use HasFactory, Notifiable, HasRoles;
        protected $guard_name = 'web'; // or whatever guard you want to use

        /**
         * Aangepaste primaire sleutel.
         *
         * @var string
         */
        protected $primaryKey = 'id';

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
        // public function hasRole($role)
        // {
        //     return $this->role === $role; // Adjust according to how you manage roles
        // }

        

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
         * The attributes that should be cast to native types.
         *
         * @var array<string, string>
         */
        protected $casts = [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];

        /**
         * Relatie naar de 'Afspraak' model.
         */
        public function afspraken()
        {
            return $this->hasMany(Afspraak::class, 'gebruikers_id', 'gebruikers_id');
        }

        /**
         * Mutator voor het opslaan van voornaam met een hoofdletter.
         *
         * @param string $value
         */
        public function setVoornaamAttribute($value)
        {
            $this->attributes['voornaam'] = ucfirst($value);
        }
    }
