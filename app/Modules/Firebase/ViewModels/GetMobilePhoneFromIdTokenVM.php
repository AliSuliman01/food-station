<?php

namespace App\Modules\Firebase\ViewModels;

use App\Modules\Firebase\Services\FirebaseAuthenticator;
use Illuminate\Contracts\Support\Arrayable;

class GetMobilePhoneFromIdTokenVM implements Arrayable
{
    private $id_token;

    private $firebaseAuthenticator;

    public function __construct($id_token)
    {
        $this->id_token = $id_token;
        $this->firebaseAuthenticator = new FirebaseAuthenticator();
    }

    public function toArray()
    {
        return $this->firebaseAuthenticator->getMobilePhone($this->id_token);
    }
}
