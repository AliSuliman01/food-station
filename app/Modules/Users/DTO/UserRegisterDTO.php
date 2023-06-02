<?php


namespace App\Modules\Users\DTO;

use App\Classes\OptimizedDataTransferObject;
use Illuminate\Support\Facades\Hash;

class UserRegisterDTO extends OptimizedDataTransferObject
{

	/* @var string|null */
	public $name;
	/* @var string|null */
	public $id_token;
	/* @var string|null */
	public $photo_path;
	/* @var string|null */
	public $password;

    public static function fromRequest($request)
    {
        return new self([
			'name'				=> $request['name'] ?? null ,
			'id_token'				=> $request['id_token'] ?? null ,
			'photo_path'				=> $request['photo_path'] ?? null ,
			'password'				=> isset($request['password'])? Hash::make($request['password']) : null ,
        ]);
    }
}
