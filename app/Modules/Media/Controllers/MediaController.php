<?php

namespace App\Modules\Media\Controllers;

use App\Helpers\Response;
use App\Http\Requests\Api\V1\Media\UploadImageRequest;
use App\Modules\Media\Actions\UploadFileAction;

class MediaController
{
    public function uploadImage(UploadImageRequest $request)
    {
        $data = $request->validated();

        $filePath = UploadFileAction::execute($data['file']);

        return response()->json(Response::success($filePath));
    }
}
