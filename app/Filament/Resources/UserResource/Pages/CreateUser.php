<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Enums\RoleEnum;
use App\Filament\Resources\UserResource;
use App\Modules\Users\Actions\StoreUserAction;
use App\Modules\Users\DTO\UserDTO;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        $userDTO = UserDTO::fromRequest($data);

        $user = StoreUserAction::execute($userDTO, RoleEnum::fromKey($data['role']));

        return $user;
    }
}
