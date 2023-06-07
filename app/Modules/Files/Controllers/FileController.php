<?php


namespace App\Modules\Files\Controllers;


use App\Helpers\Response;
use App\Modules\Files\Actions\UploadFileAction;
use App\Modules\Files\Requests\UploadFileRequest;

class FileController
{
    public function upload(UploadFileRequest $request)
    {
        $data = $request->validated();

        dd($data['file']);

        $file_path = UploadFileAction::execute($data['file_path'], $data['file']);

        return response()->json(Response::success($file_path));
    }
}
