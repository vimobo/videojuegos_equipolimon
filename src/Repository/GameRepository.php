<?php
declare(strict_types=1);

namespace Repository;
use core\JsonInFile;
use Models\Videogame;
use DirectoryIterator;

class GameRepository
{
    public private(set) string $directory;
    public private(set) string $jsonFile;
    public private(set) array $files;
    public private(set) array $file;
    public private(set) Videogame $game;

    public function __construct(array $file, array $input)
    {
        $this->directory = __DIR__ . "/../database/games";
        $this->jsonFile = $this->directory . 'videogames.json';
        $this->file = $file;
        $this->files = [];
        $this->game = new Videogame($input['gameName'], $input['author'], $input['category'], $input['description']);

        if (!is_dir($this->directory))
            mkdir($this->directory, 0755);

    }

    public function games()
    {
        $this->uploadGames();
        $this->createOrAddToVideogameJson();
        $this->getFiles();
    }

    public function uploadGames()
    {
        $origin = $this->file['tmp_name'];
        $fileName =   time() . ".zip";
        move_uploaded_file($origin, $this->directory . "/" . $fileName);

        $this->game->setPath($fileName);
    }

    private function getFiles(): void
    {
        $document = $this->directory . "/videogameList.json";
        $this->files = JsonInFile::getDataFromJsonInFile($document);
    }

    private function createOrAddToVideogameJson()
    {
        $document = $this->directory . "/videogameList.json";
        if (!is_file($document))
            fopen($document, "w");

        JsonInFile::addToJsonInFile($document, $this->game->path, $this->game);

    }



}