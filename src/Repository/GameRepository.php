<?php
declare(strict_types=1);

namespace Repository;

class GameRepository
{
    public private(set) string $directory;
    public private(set) array $response;

    public function __construct()
    {
        $dir = __DIR__ . "/../database/games";

        if (!is_dir($dir))
            mkdir($dir, 7550);

        $this->directory = $dir;
        $this->response = [];
    }

    public function games()
    {
        $file = $_FILES['gamefile'];

        $origin = $file['tmp_name'];

        if (!move_uploaded_file($origin, $this->directory)) {
            $response['errors']['upload'] = "Upload failed";
        }
    }

}