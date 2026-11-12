<?php
declare(strict_types=1);

namespace Requests;

use Models\User;

class RegisterRequest
{

    public private(set) array $response =[];

    public function __construct(array $input)
    {
        $this->response = [];

        $this->sanitize($input);
        $this->validate();
    }

    public function sanitize(array $response)
    {

        $this->response['mail'] = strip_tags(htmlspecialchars(trim($response['mail'])));
        $this->response['password'] = strip_tags($response['password']);
        $this->response['passwordR'] = $response['passwordR'] ?? "";
    }

    public function validate()
    {
        var_dump($this->response);
        if (!filter_var($this->response['mail'], FILTER_VALIDATE_EMAIL)) {
            $this->response['errors']['mail'] = "Email no válido";
            }
            
            $password = $this->response['password'];
            
        if (!preg_match('/[A-Z]/', $password)) {
            $this->response['errors']['password']['mayuscula'] = "Requiere una mayúscula";
        }

        if (password_verify($password , $this->response['passwordR'])) {
            $this->response['errors']['password']['repetido'] = "Las contraseñas no coinciden";
        }

        if (!preg_match('/[a-z]/', $password)) {
            $this->response['errors']['password']['minuscula'] = "Requiere una minúscula";
        }

        if (!preg_match('/[0-9]/', $password)) {
            $this->response['errors']['password']['numero'] = "Requiere un número";
        }

        if (strlen($password) < 10) {
            $this->response['errors']['password']['longitud'] = "Necesita al menos 10 caracteres";
        }

        $this->register();
    }

    public function register(){
        if(empty($this->response['errors'])){
           $user =  new User($this->response['password'], $this->response['mail']);
        }
    }

}