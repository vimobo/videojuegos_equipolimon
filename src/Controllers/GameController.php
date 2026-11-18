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
        $file = $_FILES['gamefile'];
        $gamesRequest = new GamesRequest($file);
        if ((isset($gamesRequest->response['errors']))) {
            $this->pages->render('form/gameForm', $gamesRequest->response);
        } else {
            $repo = new GameRepository($file);
            if(!isset($repo->response['errors']))
                $this->pages->render('form/games', $gamesRequest->response);
        }
    }
}