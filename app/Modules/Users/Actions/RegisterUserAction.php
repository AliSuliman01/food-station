<?php

namespace App\Modules\Users\Actions;

use App\Modules\Firebase\ViewModels\GetMobilePhoneFromIdTokenVM;
use App\Modules\Users\DTO\UserDTO;
use App\Modules\Users\DTO\UserRegisterDTO;

class RegisterUserAction
{
    public static function execute(
        UserRegisterDTO $userRegisterDTO
    ){
        $mobile_phone = (new GetMobilePhoneFromIdTokenVM($userRegisterDTO->id_token))->toArray();

        if (!$mobile_phone) throw new \Exception();

        $userDto = UserDTO::fromRequest($userRegisterDTO->toArray() + ['mobile_phone' => $mobile_phone]);

        return StoreUserAction::execute($userDto);
    }
}
