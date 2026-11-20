<?php
declare(strict_types=1);

namespace Requests;
use function Core\e;

use finfo;

class GamesRequest
{

    public private(set) array $response;

    public function __construct(array $fileInput, array $dataInput)
    {
        $this->response = [];
        $this->sanitize($dataInput);
        $this->validate($fileInput);
    }

    public function sanitize($input): void
    {
        $this->sanitizeElement($input, "gameName");
        $this->sanitizeElement($input, "description");
        $this->sanitizeElement($input, "author");
        $this->sanitizeElement($input, "category");
    }

    public function sanitizeElement($input, $name): void
    {
        $this->response[$name] = strip_tags(e($input[$name]));
    }

    public function validate($input): void 
    {
        $this->validateData();
        $this->validateFile($input);
    }
    


    public function validateFile($input): void
    {
        define('MAX_SIZE', 1024 * 1024 * 10);

        if ($input['name'] == '') {
            $this->response['errors']['empty'] = "Upload something..";
        }

        if ($input['error'] != UPLOAD_ERR_OK) {
            $this->response['errors']['size'] = "Upload has failed";
            return;
        }
        $tmp = $input['tmp_name'];

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

    public function validateData(): void {

        if ($this->response['gameName'] == '') {
            $this->response['errors']['emptyName'] = "Name is empty";
        }

        if ($this->response['description'] == '') {
            $this->response['errors']['emptyDescription'] = "Description is empty";
        }

        if ($this->response['category'] == '') {
            $this->response['errors']['emptyCategory'] = "Category is empty";
        }

        if ($this->response['author'] == '') {
            $this->response['errors']['emptyAuthor'] = "Author is empty";
        }

        if (strlen($this->response['gameName']) > 40) {
            $this->response['errors']['nameTooLong'] = "Name is too long";
        }

        if (strlen($this->response['description']) > 40) {
            $this->response['errors']['descriptionTooLong'] = "Description is too long";
        }

        if (strlen($this->response['author']) > 40) {
            $this->response['errors']['authorTooLong'] = "Author is too long";
        }

        if (strlen($this->response['category']) > 40) {
            $this->response['errors']['categoryTooLong'] = "Category is too long";
        }
        return;
    }
}