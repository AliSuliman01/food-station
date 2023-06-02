<?php


namespace App\Modules\Users\DTO;

use App\Classes\OptimizedDataTransferObject;
use Illuminate\Support\Facades\Hash;

class UserLoginDTO extends OptimizedDataTransferObject
{
	/* @var string|null */
	public $mobile_phone;
	/* @var string|null */
	public $password;

    public static function fromRequest($request)
    {
        return new self([
			'mobile_phone'				=> $request['mobile_phone'] ?? null ,
			'password'				=> isset($request['password'])? Hash::make($request['password']) : null ,
        ]);
    }
}
