<?php
declare(strict_types=1);

namespace Requests;

class GamesRequests
{

    public private(set) array $response;

    public function __construct(array $input)
    {
        $this->response = [];
        $this->validate($input);
    }

    public function validate($input): void
    {
        const 
        var_dump($input);
        if

        if($input['error'] != UPLOAD_ERR_OK)
            return;

        if(!is_uploaded_file($input))
            return;

        if($input.pathinfo() != "zip")
            return;
    }

}