<?php
declare(strict_types=1);

namespace Repository;

class GameRepository
{
    public private(set) string $directory;

    public function __construct()
    {
        $dir = __DIR__ . "/../database/";

        if (!is_dir($dir))
            mkdir($dir, 7550);

        $this->directory = $dir;
    }

    
}