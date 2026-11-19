<?php
declare(strict_types=1);

namespace Core;

class JsonInFile
{
    private static int $JSON_FLAGS = JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE;

    public static function getDataFromJsonInFile(string $file) : array
    {
        $dataFound = [];

        if (is_file($file))
            $dataFound = json_decode(file_get_contents($file), true) ?: [];

        return $dataFound;
    }

    public static function getValueByKeyInJsonFile(string $file, mixed $key) : mixed
    {
        return self::getDataFromJsonInFile($file)[$key] ?? null;
    }

    public static function doesKeyExistInJsonInFile(string $file, mixed $key) : bool
    {
        return !is_null(self::getValueByKeyInJsonFile($file, $key));
    }

    public static function addToJsonInFile(string $file, string $key, mixed $content) : void
    {
        $jsonInside = self::getDataFromJsonInFile($file);
        $jsonInside[$key] = $content;
        $jsonInside = json_encode((object)$jsonInside, self::$JSON_FLAGS);
        
        file_put_contents($file, $jsonInside);
    }
}