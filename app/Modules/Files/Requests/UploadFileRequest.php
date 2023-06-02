<?php


namespace App\Modules\Files\Requests;


use App\Http\Requests\ApiFormRequest;

class UploadFileRequest extends ApiFormRequest
{
    public function rules()
    {
        return [
          'file' => ['required', 'file'],
          'file_name' => ['nullable', 'string'],
          'file_path' => ['required', 'string'],
        ];
    }
}
