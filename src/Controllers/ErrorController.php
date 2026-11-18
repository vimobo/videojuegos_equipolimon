<?php

declare(strict_types = 1);

namespace Controllers;

use Core\Pages;

// ----------------------------------------------------------
// CLASSES
// ----------------------------------------------------------

class ErrorController
{
    public static function show_error404() : void
    {
        http_response_code(404);
        (new Pages())->render('error/error404');
    }
}