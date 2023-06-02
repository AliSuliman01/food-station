<?php


namespace App\Modules\Firebase\Services;


use Kreait\Firebase\Exception\Auth\FailedToVerifyToken;

class FirebaseAuthenticator
{
    protected $auth;

    public function __construct()
    {
        $this->auth = app('firebase.auth');
    }

    public function getMobilePhone($id_token)
    {
        try {
            $verifiedIdToken = $this->auth->verifyIdToken($id_token);
        } catch (FailedToVerifyToken $e) {
            throw new \Exception();
        }

        return $verifiedIdToken->claims()->get('sub');
    }
}
