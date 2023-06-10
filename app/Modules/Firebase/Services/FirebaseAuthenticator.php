<?php

namespace App\Modules\Firebase\Services;

use Kreait\Laravel\Firebase\Facades\Firebase;

class FirebaseAuthenticator
{
    protected $auth;

    public function __construct()
    {
        $this->auth = Firebase::auth();
    }

    public function getMobilePhone($id_token)
    {
        $verifiedIdToken = $this->auth->verifyIdToken($id_token);

        return $verifiedIdToken->claims()->get('sub');
    }
}
