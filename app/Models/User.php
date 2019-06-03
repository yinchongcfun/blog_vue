<?php
/**
 * Created by PhpStorm.
 * User: cfun
 * Date: 2019/5/11
 * Time: 10:56
 */

namespace App\Models;


use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable  implements JWTSubject
{
    use Notifiable;
    protected $guarded = [];
    protected $table = 'users';

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getkey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {

        return [];
    }
}