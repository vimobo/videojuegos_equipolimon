<?php
declare(strict_types=1);

namespace Repository;

use Models\User;

class UserRepository
{

    public function addUser(User $user)
    {
        $json = json_encode($user, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

        $path = __DIR__ . "/../database/user.json";

        file_put_contents($path, $json);
    }


    public function findUserByEmail(string $email)
    {

    }



}