<?php
namespace Controllers;

use Core\Pages;
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
        $gamesRequest = new GamesRequest($_FILES['gamefile']);
        // if (empty($gamesRequest->response['errors'])) {
        $this->pages->render('form/formResponse', $gamesRequest->response);
        /*} else {
            $this->pages->render('form/formResponse', $gamesRequest->response);

        }*/
    }
}