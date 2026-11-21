<?php
declare(strict_types=1);

namespace Models;

class Videogame {

    public private(set) string $fileName;
    public private(set) string $author;
    public private(set) string $category;
    public private(set) string $description;
    public private(set) string $path;



	public function __construct($fileName,  $author, $gameCategory, $description) {

		$this->fileName = $fileName;
		$this->author = $author;
		$this->category = $gameCategory;
		$this->description = $description;
		$this->path = ""; 
	}


	public function getPath() {
		return $this->path;
	}

	public function setPath($value) {
		$this->path = $value;
	}
}