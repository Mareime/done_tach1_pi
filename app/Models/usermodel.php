<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as BasicAuthenticatable;

class UserModel extends Model implements Authenticatable
{
    use BasicAuthenticatable;

    protected $table = 'user';

    protected $fillable = [
        'email',
        'password',
    ];

    protected $hidden = [
        'password', // Masque le mot de passe dans les réponses JSON
        'remember_token', // Ajoutez ceci si vous utilisez la fonctionnalité "Se souvenir de moi"
    ];

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password;
    }

    /**
     * Mutator to hash the password before saving it.
     *
     * @param string $value
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}
