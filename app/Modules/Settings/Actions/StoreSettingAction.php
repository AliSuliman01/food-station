<?php

namespace App\Modules\Settings\Actions;

use App\Modules\Settings\DTO\SettingDTO;
use App\Modules\Settings\Model\Setting;

class StoreSettingAction
{
    public static function execute(
        SettingDTO $settingDTO
    ) {

        return Setting::create(array_null_filter($settingDTO->toArray()));
    }
}
