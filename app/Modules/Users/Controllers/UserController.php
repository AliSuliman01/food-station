<?php


namespace App\Modules\Users\Controllers;


use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Modules\Users\Actions\RegisterUserAction;
use App\Modules\Users\Actions\UserLoginAction;
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
use App\Modules\Users\Requests\UserLoginRequest;
use App\Modules\Users\ViewModels\GetUserVM;
use App\Modules\Users\ViewModels\GetAllUsersVM;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index(){

        return view('users.admin.index', [
            'users' => (new GetAllUsersVM())->toArray()
        ]);
    }

    public function edit(User $user){

        return view('users.admin.edit', [
            'user' => (new GetUserVM($user))->toArray()
        ]);
    }

    public function create(){

        return view('users.admin.create');
    }

    public function store(StoreUserRequest $request){

        $data = $request->validated() ;

        $userDTO = UserDTO::fromRequest($data);

        $user = StoreUserAction::execute($userDTO);

        return redirect()->route('admin.users.index');
    }

    public function update(User $user, UpdateUserRequest $request){

        $data = $request->validated() ;

        $userDTO = UserDTO::fromRequest($data);

        if (isset($data['photo'])) {
            $image_path = Storage::disk('public')->putFile('users', $data['photo']);

            $userDTO->photo_path = "/storage/$image_path";
        }
        $user = UpdateUserAction::execute($user, $userDTO);

        return back();
    }

    public function destroy(User $user){
        DestroyUserAction::execute($user);
        return redirect()->route('admin.users.index');
    }

    public function register(RegisterUserRequest $request)
    {
        $data = $request->validated();

        $userRegisterDto = UserRegisterDTO::fromRequest($data);

        $result = RegisterUserAction::execute($userRegisterDto);

        return response()->json(Response::success($result));
    }

    public function login(UserLoginRequest $request)
    {
        $data = $request->validated();

        $userLoginDto = UserLoginDTO::fromRequest($data);

        $result = UserLoginAction::execute($userLoginDto);

        return response()->json(Response::success($result));
    }
}
