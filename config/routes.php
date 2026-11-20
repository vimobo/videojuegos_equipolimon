<?php
use Controllers\AuthController;
use Controllers\GameController;
use Core\Router;
use Repository\GameRepository;


Router::add('get', '/', [AuthController::class, 'showHome']);

Router::add('get', '/login', [AuthController::class, 'login']);
Router::add('get', '/register', [AuthController::class, 'register']);
Router::add('post', '/processRegister', [AuthController::class, 'processRegister']);
Router::add('post', '/processLogin', [AuthController::class, 'processLogin']);
Router::add('post', '/addGame', [GameController::class, 'addGame']);
Router::add('post', '/games', [GameController::class, 'games']);
Router::add('get', '/games/download', [GameController::class, 'downloadGame']);