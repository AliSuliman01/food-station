<?php


namespace App\Modules\Users\Controllers;

use App\Helpers\Storage;
use App\Http\Controllers\Controller;
use App\Modules\Users\Model\User;
use App\Modules\Users\Actions\StoreUserAction;
use App\Modules\Users\Actions\DestroyUserAction;
use App\Modules\Users\Actions\UpdateUserAction;
use App\Modules\Users\DTO\UserDTO;
use App\Modules\Users\Requests\StoreUserRequest;
use App\Modules\Users\Requests\UpdateUserRequest;
use App\Modules\Users\ViewModels\GetUserVM;
use App\Modules\Users\ViewModels\GetAllUsersVM;

class AdminUserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

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

        if (isset($data['photo']))
            $userDTO->photo_path = Storage::putFile('users', $data['photo']);

        $user = StoreUserAction::execute($userDTO);

        return redirect()->route('admin.users.index');
    }

    public function update(User $user, UpdateUserRequest $request){

        $data = $request->validated() ;

        $userDTO = UserDTO::fromRequest($data);

        if (isset($data['photo']))
            $userDTO->photo_path = Storage::putFile('users', $data['photo']);

        $user = UpdateUserAction::execute($user, $userDTO);

        return back();
    }

    public function destroy(User $user){
        DestroyUserAction::execute($user);
        return redirect()->route('admin.users.index');
    }

}
