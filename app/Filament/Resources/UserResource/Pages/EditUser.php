<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Enums\RoleEnum;
use App\Filament\Resources\UserResource;
use App\Modules\Users\Actions\StoreUserAction;
use App\Modules\Users\Actions\UpdateUserAction;
use App\Modules\Users\DTO\UserDTO;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        $userDTO = UserDTO::fromRequest($data);

        $user = UpdateUserAction::execute($record, $userDTO, RoleEnum::fromKey($data['role']));

        return $user;
    }

    protected function getRedirectUrl(): string
    {
        return self::getResource()::getUrl('index');
    }

}
