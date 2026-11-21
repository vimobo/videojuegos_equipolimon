<?php
declare(strict_types=1);

namespace Requests;

use Models\User;

class RegisterRequest
{
    use PasswordValidator;
    use EmailValidator;

    public private(set) array $response = [];

    public function __construct(array $input)
    {
        $this->response = [];

        $this->sanitize($input);
        $this->validate();
    }

    public function sanitize($input) {
        $this->sanitizeEmail($this->response, $input);
        $this->sanitizePassword($this->response, $input);
        $this->response['passwordR'] = $response['passwordR'] ?? "";

    }
    

    public function validate()
    {

        $this->validateEmail($this->response);
        $this->validatePassword($this->response);

        $this->register();
    }

    public function register()
    {
        if (empty($this->response['errors'])) {
            $user = new User($this->response['password'], $this->response['mail']);
        }
    }

}