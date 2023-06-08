<?php

namespace App\Modules\Settings\Actions;

use App\Modules\Settings\Model\Setting;
use App\Modules\Settings\DTO\SettingDTO;

class UpdateSettingAction
{
    public static function execute(
        Setting $setting,SettingDTO $settingDTO
    ){
        $setting->update(array_null_filter($settingDTO->toArray()));
        return $setting;
    }
}
