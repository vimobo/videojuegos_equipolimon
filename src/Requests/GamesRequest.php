<?php
declare(strict_types=1);

namespace Requests;

use finfo;

class GamesRequest
{

    public private(set) array $response;

    public function __construct(array $input)
    {
        $this->response = [];
        $this->validate($input);
    }

    public function validate($input): void
    {
        define('MAX_SIZE', 1024 * 1024 * 20);

        if ($input['name'] == '') {
            $this->response['errors']['empty'] = "Upload something..";
        }

        if ($input['error'] != UPLOAD_ERR_OK) {
            $this->response['errors']['size'] = "Upload has failed";
            return;
        }
        $tmp = $_FILES['gamefile']['tmp_name'];

        if (!is_uploaded_file($input['tmp_name'])) {
            $this->response['errors']['file'] = "Not a file";
        }

        if ($input['size'] > MAX_SIZE) {
            $this->response['errors']['size'] = "File size is above limit.";
        }

        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $mime = $finfo->file($input["tmp_name"]);

        if ($mime != "application/zip") {
            $this->response['errors']['format'] = "File format not .zip";
        }

        //if($input.pathinfo() != "zip")
        //    return;
    }
}