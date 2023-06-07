<?php


namespace App\Modules\Files\Controllers;


use App\Helpers\Response;
use App\Modules\Files\Actions\UploadFileAction;
use App\Modules\Files\Requests\UploadFileRequest;

class FileController
{
    public function upload(UploadFileRequest $request)
    {
        return response()->json($request->all());
        $data = $request->validated();

        $file_path = UploadFileAction::execute($data['file_path'], $data['file']);

        return response()->json(Response::success($file_path));
    }
}
