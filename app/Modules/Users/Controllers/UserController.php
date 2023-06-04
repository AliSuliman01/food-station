<?php


namespace App\Modules\Users\Controllers;


use App\Exceptions\GeneralException;
use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Mail\EmailVerificationMail;
use App\Modules\Users\Actions\RegisterUserAction;
use App\Modules\Users\Actions\SetNewAuthTokensAction;
use App\Modules\Users\Actions\UserLoginAction;
use App\Modules\Users\Actions\SendVerificationEmailAction;
use App\Modules\Users\Actions\VerifyEmailAction;
use App\Modules\Users\Actions\VerifyUserEmailAction;
use App\Modules\Users\DTO\UserLoginDTO;
use App\Modules\Users\DTO\UserRegisterDTO;
use App\Modules\Users\Model\User;
use App\Modules\Users\Actions\StoreUserAction;
use App\Modules\Users\Actions\DestroyUserAction;
use App\Modules\Users\Actions\UpdateUserAction;
use App\Modules\Users\DTO\UserDTO;
use App\Modules\Users\Requests\StoreUserRequest;
use App\Modules\Users\Requests\UpdateUserRequest;
use App\Modules\Users\Requests\RegisterUserRequest;
use App\Modules\Users\Requests\LoginUserRequest;
use App\Modules\Users\Requests\VerifyEmailRequest;
use App\Modules\Users\ViewModels\GetUserVM;
use App\Modules\Users\ViewModels\GetAllUsersVM;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {

        return view('users.admin.index', [
            'users' => (new GetAllUsersVM())->toArray()
        ]);
    }

    public function edit(User $user)
    {

        return view('users.admin.edit', [
            'user' => (new GetUserVM($user))->toArray()
        ]);
    }

    public function create()
    {

        return view('users.admin.create');
    }

    public function store(StoreUserRequest $request)
    {

        $data = $request->validated();

        $userDTO = UserDTO::fromRequest($data);

        $user = StoreUserAction::execute($userDTO);

        return redirect()->route('admin.users.index');
    }

    public function update(User $user, UpdateUserRequest $request)
    {

        $data = $request->validated();

        $userDTO = UserDTO::fromRequest($data);

        $user = UpdateUserAction::execute($user, $userDTO);

        return back();
    }

    public function destroy(User $user)
    {
        DestroyUserAction::execute($user);
        return redirect()->route('admin.users.index');
    }

    public function register(RegisterUserRequest $request)
    {
        $data = $request->validated();

        $userRegisterDto = UserRegisterDTO::fromRequest($data);

        try {
            $user = DB::transaction(function ()use($userRegisterDto) {

                $user = RegisterUserAction::execute($userRegisterDto);

                SendVerificationEmailAction::execute($user);

                SetNewAuthTokensAction::execute($user);

                return $user;

            });

        } catch (\Throwable $e) {
            throw new GeneralException($e->getMessage());
        }

        return response()->json(Response::success($user));
    }

    public function login(LoginUserRequest $request)
    {
        $data = $request->validated();

        $userLoginDto = UserLoginDTO::fromRequest($data);

        try {

            $user = UserLoginAction::execute($userLoginDto);

            SetNewAuthTokensAction::execute($user);

        } catch (\Throwable $e) {
            throw new GeneralException($e->getMessage());
        }

        return response()->json(Response::success($user));
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
}
