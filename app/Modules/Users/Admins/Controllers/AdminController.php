<?php

namespace App\Modules\Users\Admins\Controllers;

use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Modules\Users\Admins\Actions\DestroyUserAction;
use App\Modules\Users\Admins\Actions\StoreAdminAction;
use App\Modules\Users\Admins\Actions\UpdateAdminAction;
use App\Modules\Users\Admins\DTO\UserDTO;
use App\Modules\Users\Model\User;
use App\Modules\Users\Admins\Requests\StoreAdminRequest;
use App\Modules\Users\Admins\Requests\UpdateUserRequest;
use App\Modules\Users\Admins\ViewModels\GetAllUsersVM;
use App\Modules\Users\Admins\ViewModels\GetUserVM;

class AdminController extends Controller
{
    public function index()
    {
        return response()->json(Response::success((new GetAllUsersVM())->toArray()));
    }

    public function store(StoreAdminRequest $request)
    {
        $data = $request->validated();

        $userDTO = UserDTO::fromRequest($data);

        $user = StoreAdminAction::execute($userDTO);

        return response()->json(Response::success((new GetUserVM($user))->toArray()));
    }

    public function update(User $user, UpdateUserRequest $request)
    {

        $data = $request->validated();

        $userDTO = UserDTO::fromRequest($data);

        $user = UpdateAdminAction::execute($user, $userDTO);

        return response()->json(Response::success((new GetUserVM($user))->toArray()));

    }

    public function destroy(User $user)
    {
        DestroyUserAction::execute($user);

        return response()->json(Response::success((new GetUserVM($user))->toArray()));
    }
}
