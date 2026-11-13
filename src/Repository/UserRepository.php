<?php
declare(strict_types=1);

namespace Repository;

use Models\User;

class UserRepository
{

    private static int $idCount = -1;

    private static string $directory = __DIR__ . "/../database";
    private static string $path = __DIR__ . "/../database/user.json";

    public static function initialize()
    {
        if (self::$idCount > 0 || self::doesPathExists())
            return;

        $data = json_decode(self::$path, true);
        self::$idCount = count($data);
    }

    public static function doesPathExists(): bool
    {
        if (!is_dir(self::$directory))
            return false;

        if (!is_file(self::$path))
            return false;


        return true;
    }

    public static function addUser(User $user)
    {

        self::initialize();

        $doesPathExist = self::doesPathExists();

        if ($doesPathExist) {

            $currentData[self::$idCount] = $user;
            
            $currentData = json_decode(file_get_contents(self::$path), true);
            $json = json_encode($currentData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            
            file_put_contents(self::$path, $json);
            //var_dump(UserRepository::findUserById("0"));
        } else {
            mkdir(self::$directory, 0755);
        }
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
}