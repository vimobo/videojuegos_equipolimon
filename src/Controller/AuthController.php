<?php
declare(strict_types=1);

namespace Controller;

use Lib\Pages;
use Requests\LoginRequest;
use Requests\RegisterRequest;

class AuthController
{


    private Pages $pages;

    public function __construct()
    {
        $this->pages = new Pages();
    }

    public function showHome(): void
    {
        $this->pages->render('form/home');
    }

    public function register()
    {
        $this->pages->render('form/register');
    }

    public function login()
    {
        $this->pages->render('form/login');
    }

    public function processLogin()
    {
        $loginRequest = new LoginRequest($_POST['login'] ?? []);
        if (!empty($loginRequest->response['errors'])) {
            $this->pages->render('form/login', $loginRequest->response);

        } else {
            $this->pages->render('form/formResponse', $loginRequest->response);
        }
    }

    public function processRegister()
    {
        $registerRequest = new RegisterRequest($_POST['register'] ?? []);
        if (!empty($registerRequest->response['errors'])) {
            $this->pages->render('form/register', $registerRequest->response);

        } else {
            $this->pages->render('form/formResponse', $registerRequest->response);
        }
    }


}