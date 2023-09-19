<?php

namespace App\Modules\Users\Controllers;

use App\Enums\RoleEnum;
use App\Exceptions\GeneralException;
use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Mail\ResetPasswordMail;
use App\Modules\Users\Actions\CheckResetPasswordCodeAction;
use App\Modules\Users\Actions\CheckResetPasswordTokenAction;
use App\Modules\Users\Actions\GenerateResetPasswordCodeAction;
use App\Modules\Users\Actions\GenerateResetPasswordTokenAction;
use App\Modules\Users\Admins\ViewModels\GetUserByEmailVM;
use App\Modules\Users\Requests\ForgetPasswordUserRequest;
use App\Modules\Users\Requests\ResetPasswordUserRequest;
use App\Modules\Users\Requests\VerifyCodeUserRequest;
use App\Modules\Users\ViewModels\GetUserOrdersVM;
use App\Modules\Users\Actions\DestroyUserAction;
use App\Modules\Users\Actions\RegisterUserAction;
use App\Modules\Users\Actions\SendVerificationEmailAction;
use App\Modules\Users\Actions\StoreUserAction;
use App\Modules\Users\Actions\UpdateUserAction;
use App\Modules\Users\Actions\UserLoginAction;
use App\Modules\Users\DTO\UserDTO;
use App\Modules\Users\DTO\UserLoginDTO;
use App\Modules\Users\DTO\UserRegisterDTO;
use App\Modules\Users\Model\User;
use App\Modules\Users\Requests\LoginUserRequest;
use App\Modules\Users\Requests\RegisterUserRequest;
use App\Modules\Users\Requests\StoreUserRequest;
use App\Modules\Users\Requests\UpdateUserRequest;
use App\Modules\Users\ViewModels\GetAllUsersVM;
use App\Modules\Users\ViewModels\GetUserVM;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function index()
    {
        return response()->json(Response::success((new GetAllUsersVM())->toArray()));
    }

    public function userOrders(User $user)
    {
        Gate::authorize('userOrders', $user);

        return response()->json(Response::success((new GetUserOrdersVM($user))->toArray()));
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

                $user->assignRole(RoleEnum::CUSTOMER);

                //                SendVerificationEmailAction::execute($user);

                $tokens = $user->createToken('access_token', $userRegisterDto->password);

                $user->setAttribute('access_token', $tokens['access_token']);
                $user->setAttribute('refresh_token', $tokens['refresh_token']);

                return $user;

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

                $tokens = $user->createToken('access_token', $userLoginDto->password);

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

    public function logout()
    {
        Auth::user()->token()->revoke();

        return response()->json(Response::success());
    }

    public function forget_password(ForgetPasswordUserRequest $request)
    {
        $user = (new GetUserByEmailVM($request->json('email')))->toArray();

        GenerateResetPasswordCodeAction::execute($user);

//        try {
//
//            Mail::to($user->email)->send(new ResetPasswordMail($user));
//
//        }catch (\Throwable $throwable){
//            return \response()->json(Response::error($throwable->getMessage()), 400);
//        };

        return \response()->json(Response::success());
    }

    public function verify_code(VerifyCodeUserRequest $request)
    {
        $user = (new GetUserByEmailVM($request->json('email')))->toArray();

        $bool = CheckResetPasswordCodeAction::execute($user, $request->json('reset_password_code'));

        if ($bool)
            $reset_password_token = GenerateResetPasswordTokenAction::execute($user);
        else
            $reset_password_token = null;


        return \response()->json(Response::success($reset_password_token));
    }

    public function reset_password(ResetPasswordUserRequest $request)
    {
        $user = (new GetUserByEmailVM($request->json('email')))->toArray();

        $bool = CheckResetPasswordTokenAction::execute($user, $request->json('reset_password_token'));

        if (!$bool)
            return \response()->json(Response::error('invalid reset password token'));

        $user = UpdateUserAction::execute($user, UserDTO::fromRequest([
            'password' => $request->json('password')
        ]));

        $tokens = $user->createToken('access_token', $request->json('password'));

        return [
            'user' => $user,
            'access_token' => $tokens['access_token'],
            'refresh_token' => $tokens['refresh_token'],
        ];

    }
}
