<?php
use Controllers\AuthController;
use Core\Router;


Router::add('get', '/', [AuthController::class, 'showHome']);

Router::add('get', '/login', [AuthController::class, 'login']);
Router::add('get', '/register', [AuthController::class, 'register']);
Router::add('post', '/processRegister', [AuthController::class, 'processRegister']);
