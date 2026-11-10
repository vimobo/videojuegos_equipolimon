<?php
declare(strict_types=1);

namespace Controller;

use Lib\Pages;
use Requests\FormRequest;

class FormController
{

    private Pages $pages;



    public function __construct()
    {

        $this->pages = new Pages();
    }

    public function showform(): void
    {  
        $this->pages->render('form/form');

    }

    public function process(): void
    {
        $response = FormRequest::sanitize($_POST['data']);
        $response = FormRequest::validate($response);

        if (!empty($response['errors'])) {
            var_dump($response['errors']);
            $this->pages->render('form/form', $response);
        }else{
            $this->pages->render('form/formResponse', $response);
        }

    }

}