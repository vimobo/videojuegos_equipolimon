<?php
declare(strict_types=1);

namespace Models;

class Videogame {

    public private(set) string $fileName;
    public private(set) string $ownerEmail;

	public function __construct($fileName, $ownerEmail) {

		$this->fileName = date('Ymd_His') . bin2hex(random_bytes(4)) . $fileName;
		$this->ownerEmail = $ownerEmail;
	}

	public function getOwnerId() {
		return $this->ownerEmail;
	}

	public function setOwnerId($value) {
		$this->ownerEmail = $value;
	}

	public function getFileName() {
		return $this->fileName;
	}

	public function setFileName($value) {
		$this->fileName = $value;
	}

	public function getOwnerEmail() {
		return $this->ownerEmail;
	}

	public function setOwnerEmail($value) {
		$this->ownerEmail = $value;
	}

}