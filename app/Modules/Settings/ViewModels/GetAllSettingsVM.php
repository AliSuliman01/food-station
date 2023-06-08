<?php


namespace App\Modules\Settings\ViewModels;

use App\Modules\Settings\Model\Setting;
use Illuminate\Contracts\Support\Arrayable;

class GetAllSettingsVM implements Arrayable
{
    public function toArray()
    {
        return Setting::query()->get();
    }
}
