<?php

namespace App\Services;

use App\Models\User;
use Ramsey\Uuid\Uuid;

/**
 * Class FullTimeStep1Service.
 */
class UserService
{
    public static function store(Array $input, User $user = null) : User {

        if(!$user) {
            $user = User::create([
                'id'       => Uuid::uuid4()->getHex(),
                'username' => $input['username'],
                'password' => bcrypt($input['password']),
                'role_id'  => $input['role_id'],
            ]);
        }

        $user->fill([
            'username' => $input['username'],
            'password' => bcrypt($input['password']),
            'role_id'  => $input['role_id'],
        ]);
        $user->save();
        
        return $user;
    }
}
