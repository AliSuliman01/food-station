<?php


namespace App\Modules\Users\DTO;

use Illuminate\Support\Facades\Hash;
use Spatie\DataTransferObject\DataTransferObject;


class UserDTO extends DataTransferObject
{

	/* @var integer|null */
	public $id;
	/* @var string|null */
	public $name;
	/* @var string|null */
	public $email;
	/* @var string|null */
	public $email_verified_at;
	/* @var string|null */
	public $photo_path;
	/* @var string|null */
	public $password;
	/* @var string|null */
	public $remember_token;


    public static function fromRequest($request)
    {
        return new self([
			'id'				=> $request['id'] ?? null ,
			'name'				=> $request['name'] ?? null ,
			'email'				=> $request['email'] ?? null ,
			'email_verified_at'				=> $request['email_verified_at'] ?? null ,
			'photo_path'				=> $request['photo_path'] ?? null ,
			'password'				=> isset($request['password'])? Hash::make($request['password']) : null ,
			'remember_token'				=> $request['remember_token'] ?? null ,
        ]);
    }
}
