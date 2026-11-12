<?php
declare(strict_types=1);

namespace Requests;

class LoginRequest {

    public private(set) array $response;

    public function __construct(array $input) {
        $this->response = [];

        $this->sanitize($input);
        $this->validate();
    }

    public function sanitize(array $response) {

        $this->response['mail'] = strip_tags(htmlspecialchars(trim($response['mail'])));
        $this->response['password'] = password_hash(trim($response['password']), PASSWORD_DEFAULT);
    }

    public function validate () {
        if(!filter_var($this->response['mail'], FILTER_VALIDATE_EMAIL)) {
            $this->response['errors']['mail'] = "Email no válido";
        }
    }

}