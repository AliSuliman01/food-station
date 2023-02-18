<?php


namespace App\Modules\Images\Controllers;


use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Modules\Images\Model\Image;
use App\Modules\Images\Actions\StoreImageAction;
use App\Modules\Images\Actions\DestroyImageAction;
use App\Modules\Images\Actions\UpdateImageAction;
use App\Modules\Images\DTO\ImageDTO;
use App\Modules\Images\Requests\StoreImageRequest;
use App\Modules\Images\Requests\UpdateImageRequest;
use App\Modules\Images\ViewModels\GetImageVM;
use App\Modules\Images\ViewModels\GetAllImagesVM;

class ImageController extends Controller
{
    public function __construct(){
        $this->middleware('auth:api')->only(['store','update','destroy']);
    }
    public function index(){

        return response()->json(Response::success((new GetAllImagesVM())->toArray()));
    }

    public function show(Image $image){

        return response()->json(Response::success((new GetImageVM($image))->toArray()));
    }

    public function store(StoreImageRequest $request){

        $data = $request->validated() ;

        $imageDTO = ImageDTO::fromRequest($data);

        $image = StoreImageAction::execute($imageDTO);

        return response()->json(Response::success((new GetImageVM($image))->toArray()));
    }

    public function update(Image $image, UpdateImageRequest $request){

        $data = $request->validated() ;

        $imageDTO = ImageDTO::fromRequest($data);

        $image = UpdateImageAction::execute($image, $imageDTO);

        return response()->json(Response::success((new GetImageVM($image))->toArray()));
    }

    public function destroy(Image $image){

        return response()->json(Response::success(DestroyImageAction::execute($image)));
    }

}
