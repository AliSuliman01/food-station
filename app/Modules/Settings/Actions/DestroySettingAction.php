<?php

namespace App\Modules\Settings\Actions;

use App\Modules\Settings\Model\Setting;

class DestroySettingAction
{
    public static function execute(
        Setting $setting
    ){
        $setting->delete();
        return $setting;
    }
}
