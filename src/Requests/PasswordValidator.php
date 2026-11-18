<?php
namespace Requests;
trait PasswordValidator
{

    public function sanitizePassword(array &$response, array $input): void
    {
        $this->response['password'] = strip_tags($input['password']);
    }

    public function validatePassword(array &$response)
    {
        if (!filter_var($response['mail'], FILTER_VALIDATE_EMAIL)) {
            $response['errors']['mail'] = "Email no válido";
        }

        $password = $response['password'];

        if (!preg_match('/[A-Z]/', $password)) {
            $response['errors']['password']['mayuscula'] = "Requiere una mayúscula";
        }

        if (!preg_match('/[a-z]/', $password)) {
            $response['errors']['password']['minuscula'] = "Requiere una minúscula";
        }

        if (!preg_match('/[0-9]/', $password)) {
            $response['errors']['password']['numero'] = "Requiere un número";
        }

        if (strlen($password) < 10) {
            $response['errors']['password']['longitud'] = "Necesita al menos 10 caracteres";
        }

    }
}