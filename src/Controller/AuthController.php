<?php
declare(strict_types=1);

namespace Controller;

use Lib\Pages;
use Requests\FormRequest;

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
}