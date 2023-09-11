<?php

namespace App\Modules\Users\Resources;

use App\Modules\Media\Resources\MediaResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
          'name' => $this->name,
          'username' => $this->username,
          'email' => $this->email,
          'main_image' => MediaResource::make($this->main_image),
        ];
    }
}
