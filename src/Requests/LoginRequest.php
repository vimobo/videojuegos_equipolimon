<?php
declare(strict_types=1);

namespace Requests;

use Repository\UserRepository;

class LoginRequest
{

    use EmailValidator;
    use PasswordValidator;
    public private(set) array $response;

    public function __construct(array $input)
    {
        $this->response = [];
        $this->loginRequest($input);
    }

    public function sanitize(array $input): void
    {
        $this->sanitizePassword($this->response, $input);
        $this->sanitizeEmail($this->response, $input);
    }

    public function validate(): void
    {
        $this->validatePassword($this->response);
        $this->validateEmail($this->response);
    }

    public function loginRequest(array $input): void
    {
        $this->sanitize($input);
        $this->validate();
        UserRepository::authUser($this->response);
    }

}