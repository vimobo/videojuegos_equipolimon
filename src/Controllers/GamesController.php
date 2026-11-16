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

    public function gameFile() {
        $gamesRequest = new GamesRequest($_POST['gameFile']);
    }    
}