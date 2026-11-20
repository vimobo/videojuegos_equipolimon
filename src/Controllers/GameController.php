<?php
namespace Controllers;

use Core\Pages;
use Repository\GameRepository;
use Requests\GamesRequest;

class GameController
{
    private Pages $pages;

    public function __construct()
    {
        $this->pages = new Pages();
    }

    public function addGame()
    {
        $file = $_FILES['game'];
        $data = $_POST['game'];

        $gamesRequest = new GamesRequest($file, $data);

        if ((isset($gamesRequest->response['errors']))) {
            $this->pages->render('form/gameForm', $gamesRequest->response);
            
        } else {
            $repo = new GameRepository($file, $gamesRequest->response);
            $repo->games();
            var_dump($repo->files);
            $this->pages->render('form/games',  ['files' => $repo->files]);
        }
    }

        public function downloadGame(): void
    {
        $file = __DIR__ . "/../database/games/" . basename($_GET['file']);

        if (!is_file($file)) {
            http_response_code(404);
            exit;
        }

        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($file) . '"');
        header('Content-Length: ' . filesize($file));

        readfile($file);
        exit;
    }
}