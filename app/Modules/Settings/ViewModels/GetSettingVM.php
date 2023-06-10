<?php

namespace App\Modules\Settings\ViewModels;

use Illuminate\Contracts\Support\Arrayable;

class GetSettingVM implements Arrayable
{
    private $setting;

    public function __construct($setting)
    {
        $this->setting = $setting;
    }

    public function toArray()
    {
        return $this->setting;
    }
}
