<?php

namespace App\GraphQL\Mutations;

use App\Exceptions\GeneralException;
use App\Modules\Users\Actions\UserLoginAction;
use App\Modules\Users\DTO\UserLoginDTO;

final class Login
{
    /**
     * @param  array{}  $args
     */
    public function __invoke($_, $args)
    {
        $userLoginDto = UserLoginDTO::fromRequest([
            'email' => $args['email'],
            'password' => $args['password'],
        ]);

        try {
            $user = UserLoginAction::execute($userLoginDto);

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
