<?php
declare(strict_types=1);

namespace Repository;

class GameRipository {
 private static string $directory = __DIR__ . "/../database";
    private static string $path = __DIR__ . "/../database/games.json";

    private static string $gamesDirectory = __DIR__ . "/../database/games";


    public static function uploadGame($file) {
        if(!is_dir(self::$directory))
            mkdir(self::$gamesDirectory);

        

    } 
}
