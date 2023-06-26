<?php

namespace App\GraphQL\Mutations;

use App\Exceptions\GeneralException;
use App\Modules\Users\Actions\RegisterUserAction;
use App\Modules\Users\Actions\SendVerificationEmailAction;
use App\Modules\Users\DTO\UserRegisterDTO;
use Illuminate\Support\Facades\DB;

final class Register
{
    /**
     * @param null $_
     * @param array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $userRegisterDto = UserRegisterDTO::fromRequest($args);

        try {

            $user = RegisterUserAction::execute($userRegisterDto);

            SendVerificationEmailAction::execute($user);

            $tokens = $user->createToken('access_token');

            $response = [
                'user' => $user,
                'access_token' => $tokens['access_token'],
                'refresh_token' => $tokens['refresh_token'],
            ];


        } catch (\Throwable $e) {
            throw new GeneralException($e->getMessage());
        }

        return $response;

    }
}
