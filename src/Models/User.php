<?php
declare(strict_types = 1);

namespace Models;

class User
{

        public private(set) string $email;
        public private(set) string $password;

        public function __construct(string $email, string $password) {
            $this->password = $password;
            $this->email = $email;
        }

        



	public function getEmail() : string {
		return $this->email;
	}

	public function setEmail(string $value) {
		$this->email = $value;
	}

	public function getPassword() : string {
		return $this->password;
	}

	public function setPassword(string $value) {
		$this->password = $value;
	}


}