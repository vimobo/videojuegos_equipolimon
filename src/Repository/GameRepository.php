<?php
declare(strict_types=1);

namespace Repository;

use Models\Videogame;
use DirectoryIterator;

class GameRepository
{
    public private(set) string $directory;
    public private(set) string $jsonFile;
    public private(set) array $files;
    public private(set) array $file;

    public function __construct(array $file)
    {
        $this->directory = __DIR__ . "/../database/games";
        $this->jsonFile = $this->directory . 'videogames.json';
        $this->file = $file;
        $this->files = [];

        if (!is_dir($this->directory))
            mkdir($this->directory, 0755);
    }

    public function games()
    {
        $this->uploadGames();
        $this->getFiles();
    }

    public function uploadGames()
    {
        $origin = $this->file['tmp_name'];
        var_dump($this->directory . "/" . time() . ".zip");
        move_uploaded_file($origin, $this->directory . "/" . time() . ".zip");
    }

    private function getFiles(): void
    {
        $this->files = [];
        $iterator = new DirectoryIterator($this->directory);

        foreach ($iterator as $file_data) {
            if (!$file_data->isDot())
                $this->files[] = $file_data->getFilename();
        }

    }
    /*
        public function addVideogame(string $fileName, string $ownerEmail)
        {
            $videoGame = new Videogame($fileName, $ownerEmail);

            self::initialize();

            $currentData = self::getDataFromDatabase();
            $currentData[$user->email] = $user;

            $json = json_encode((object) $currentData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            file_put_contents(self::$path, $json);
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
        }*/
}