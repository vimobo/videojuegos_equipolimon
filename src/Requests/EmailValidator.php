<?php
namespace Requests;

trait EmailValidator
{

    public function sanitizeEmail(array &$response, array $input): void
    {
        $response['mail'] = strip_tags(htmlspecialchars(trim($input['mail'])));
    }
    public function validateEmail(array &$response)
    {
        if (!filter_var($response['mail'], FILTER_VALIDATE_EMAIL)) {
            $response['errors']['mail'] = "Email no válido";
        }
    }
}