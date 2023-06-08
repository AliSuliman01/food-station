<?php

namespace App\Modules\Settings\Actions;

use App\Modules\Settings\Model\Setting;
use App\Modules\Settings\DTO\SettingDTO;

class StoreSettingAction
{
    public static function execute(
    SettingDTO $settingDTO
    ){

        return Setting::create(array_null_filter($settingDTO->toArray()));
    }
}
