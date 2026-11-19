<?php
declare(strict_types=1);

namespace Repository;

use Models\User;
use Core\JsonInFile;

class UserRepository
{
    private static string $directory = __DIR__ . "/../database";
    private static string $path = __DIR__ . "/../database/user.json";

    public static function initialize()
    {
        if (!is_dir(self::$directory))
            mkdir(self::$directory, 0755);
    }

    public static function doesPathExists(): bool
    {
        return is_dir(self::$directory) && is_file(self::$path);
    }

    public static function addUser(User $user)
    {
        self::initialize();
        JsonInFile::addToJsonInFile(self::$path, $user->email, $user);
    }

    public static function findUserById(string $id): array|null
    {
        self::$directory = __DIR__ . "/../database";
        self::$path = self::$directory . "/user.json";

        if (!is_dir(self::$directory))
            return null;

        if (!is_file(self::$path))
            return null;

        return JsonInFile::getValueByKeyInJsonFile(self::$path, $id);
    }

    public function doesUserExistByEmail(string $mail): bool
    {
        return JsonInFile::doesKeyExistInJsonInFile(self::$path, $mail);
    }

    public static function authUser(array &$response): bool
    {
        $user = self::findUserById($response['mail']);

        if (is_null($user))
        {
            $response['errors']['auth'] = "El usuario/contraseña no coinciden" ;
            return false;
        }
        if(!password_verify($response['password'], $user['password'])) {
            $response['errors']['auth'] = "El usuario/contraseña no coinciden" ;
            return false;
        }

        return password_verify($response['password'], $user['password']);
    }
}

