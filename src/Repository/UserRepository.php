<?php
declare(strict_types=1);

namespace Repository;

use Models\User;

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

    public static function getDataFromDatabase(): array
    {
        $dataFound = [];

        if (self::doesPathExists()) {
            $data = json_decode(file_get_contents(self::$path), true);

            if (!is_null($data))
                $dataFound = $data;
        }

        return $dataFound;
    }

    public static function addUser(User $user)
    {

        self::initialize();

        $currentData = self::getDataFromDatabase();
        $currentData[$user->email] = $user;

        $json = json_encode((object) $currentData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        file_put_contents(self::$path, $json);
    }

    public static function findUserById(string $id): array|null
    {
        self::$directory = __DIR__ . "/../database";
        self::$path = self::$directory . "/user.json";

        $currentData = [];

        if (!is_dir(self::$directory))
            return null;

        if (!is_file(self::$path))
            return null;

        $storedData = json_decode(file_get_contents(self::$path), true);
        if (!isset($storedData[$id]))
            return null;

        return $storedData[$id];
    }

    public function doesUserExistByEmail(string $mail): bool
    {
        return !is_null(self::findUserById($mail));
    }

    public static function authUser(array &$response): bool
    {
        $user = self::findUserById($response['mail']);

        if (!is_null($user)) {
            $dataPassword = $user['password'];
            var_dump($user);
            return password_verify($response['password'], $dataPassword);

        } else
            $response['errors']['auth'] = "El usuario/contraseña no coinciden" ;
            return false;
    }
}

