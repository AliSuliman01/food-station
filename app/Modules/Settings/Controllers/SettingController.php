<?php


namespace App\Modules\Settings\Controllers;


use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Modules\Settings\Model\Setting;
use App\Modules\Settings\Actions\StoreSettingAction;
use App\Modules\Settings\Actions\DestroySettingAction;
use App\Modules\Settings\Actions\UpdateSettingAction;
use App\Modules\Settings\DTO\SettingDTO;
use App\Modules\Settings\Requests\StoreSettingRequest;
use App\Modules\Settings\Requests\UpdateSettingRequest;
use App\Modules\Settings\ViewModels\GetSettingVM;
use App\Modules\Settings\ViewModels\GetAllSettingsVM;

class SettingController extends Controller
{
    public function __construct(){
        $this->middleware('auth:api')->only(['store','update','destroy']);
    }
    public function index(){

        return response()->json(Response::success((new GetAllSettingsVM())->toArray()));
    }

    public function show(Setting $setting){

        return response()->json(Response::success((new GetSettingVM($setting))->toArray()));
    }

    public function store(StoreSettingRequest $request){

        $data = $request->validated() ;

        $settingDTO = SettingDTO::fromRequest($data);

        $setting = StoreSettingAction::execute($settingDTO);

        return response()->json(Response::success((new GetSettingVM($setting))->toArray()));
    }

    public function update(Setting $setting, UpdateSettingRequest $request){

        $data = $request->validated() ;

        $settingDTO = SettingDTO::fromRequest($data);

        $setting = UpdateSettingAction::execute($setting, $settingDTO);

        return response()->json(Response::success((new GetSettingVM($setting))->toArray()));
    }

    public function destroy(Setting $setting){

        return response()->json(Response::success(DestroySettingAction::execute($setting)));
    }

}
