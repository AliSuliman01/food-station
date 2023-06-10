<?php

namespace App\Modules\Users\Controllers;

use App\Exceptions\GeneralException;
use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Modules\Users\Actions\DestroyUserAction;
use App\Modules\Users\Actions\RegisterUserAction;
use App\Modules\Users\Actions\SendVerificationEmailAction;
use App\Modules\Users\Actions\StoreUserAction;
use App\Modules\Users\Actions\UpdateUserAction;
use App\Modules\Users\Actions\UserLoginAction;
use App\Modules\Users\Actions\VerifyEmailAction;
use App\Modules\Users\DTO\UserDTO;
use App\Modules\Users\DTO\UserLoginDTO;
use App\Modules\Users\DTO\UserRegisterDTO;
use App\Modules\Users\Model\User;
use App\Modules\Users\Requests\LoginUserRequest;
use App\Modules\Users\Requests\RegisterUserRequest;
use App\Modules\Users\Requests\StoreUserRequest;
use App\Modules\Users\Requests\UpdateUserRequest;
use App\Modules\Users\Requests\VerifyEmailRequest;
use App\Modules\Users\ViewModels\GetAllUsersVM;
use App\Modules\Users\ViewModels\GetUserVM;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        return response()->json(Response::success((new GetAllUsersVM())->toArray()));
    }

    public function store(StoreUserRequest $request)
    {

        $data = $request->validated();

        $userDTO = UserDTO::fromRequest($data);

        $user = StoreUserAction::execute($userDTO);

        return response()->json(Response::success((new GetUserVM($user))->toArray()));
    }

    public function update(User $user, UpdateUserRequest $request)
    {

        $data = $request->validated();

        $userDTO = UserDTO::fromRequest($data);

        $user = UpdateUserAction::execute($user, $userDTO);

        return response()->json(Response::success((new GetUserVM($user))->toArray()));

    }

    public function destroy(User $user)
    {
        DestroyUserAction::execute($user);

        return response()->json(Response::success((new GetUserVM($user))->toArray()));
    }

    public function register(RegisterUserRequest $request)
    {
        $data = $request->validated();

        $userRegisterDto = UserRegisterDTO::fromRequest($data);

        try {
            $response = DB::transaction(function () use ($userRegisterDto) {

                $user = RegisterUserAction::execute($userRegisterDto);

                SendVerificationEmailAction::execute($user);

                $tokens = $user->createToken('access_token');

                return [
                    'user' => $user,
                    'access_token' => $tokens['access_token'],
                    'refresh_token' => $tokens['refresh_token'],
                ];

            });

        } catch (\Throwable $e) {
            throw new GeneralException($e->getMessage());
        }

        return response()->json(Response::success($response));
    }

    public function login(LoginUserRequest $request)
    {
        $data = $request->validated();

        $userLoginDto = UserLoginDTO::fromRequest($data);

        try {
            $response = DB::transaction(function () use ($userLoginDto) {

                $user = UserLoginAction::execute($userLoginDto);

                $tokens = $user->createToken('access_token');

                return [
                    'user' => $user,
                    'access_token' => $tokens['access_token'],
                    'refresh_token' => $tokens['refresh_token'],
                ];
            });

        } catch (\Throwable $e) {
            throw new GeneralException($e->getMessage());
        }

        return response()->json(Response::success($response));
    }

    public function verify_email(VerifyEmailRequest $request)
    {
        $data = $request->validated();

        try {

            $user = VerifyEmailAction::execute(Auth::user(), $data['verification_code']);

        } catch (\Throwable $e) {
            throw new GeneralException($e->getMessage());
        }

        return response()->json(Response::success($user));
    }

    public function logout()
    {
        Auth::user()->token()->revoke();

        return response()->json(Response::success());
    }
}
