<?php

namespace App\Http\Traits\Auth;

use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Laravel\Passport\Passport;

trait HasApiTokens
{
    use \Laravel\Passport\HasApiTokens {
        createToken as parentCreateToken;
    }

    public function createToken($name)
    {

        if (DB::table('oauth_clients')->count() == 0) {
            Artisan::call('passport:install');
        }

        $client = DB::table('oauth_clients')->where('password_client', 1)->first();

        if (! $client) {
            throw new \Exception(__('password.invalid'), 422);
        }

        Passport::personalAccessTokensExpireIn(Carbon::now()->addMonth());
        Passport::refreshTokensExpireIn(Carbon::now()->addDays(60));

        if (App::isLocal()) {
            $objToken = $this->parentCreateToken($name, ['*']);

            return [
                'access_token' => $objToken->accessToken,
                'refresh_token' => null,
            ];
        } else {
            $response = Http::asForm()->post('/oauth/token', [
                'grant_type' => 'password',
                'client_id' => $client->id,
                'client_secret' => $client->secret,
                'username' => $this->email,
                'password' => $this->password,
                'scope' => implode(' ', ['*']),
            ]);

            if ($response->json('error')) {
                throw new \Exception($response->json('message'));
            }

            return [
                'access_token' => $response->json('access_token'),
                'refresh_token' => $response->json('refresh_token'),
            ];
        }
    }

    public static function refresh_access_token($refresh_token, array $scopes = [])
    {

        if (DB::table('oauth_clients')->count() == 0) {
            Artisan::call('passport:install');
        }
        $client = DB::table('oauth_clients')->where('password_client', 1)->first();

        Passport::personalAccessTokensExpireIn(Carbon::now()->addMonth());
        Passport::refreshTokensExpireIn(Carbon::now()->addDays(60));

        $response = Http::asForm()->post(config('micro_contact.identity.url').'/oauth/token', [
            'grant_type' => 'refresh_token',
            'refresh_token' => $refresh_token,
            'client_id' => $client->id,
            'client_secret' => $client->secret,
            'scope' => $scopes,
        ]);

        if ($response->json('error')) {
            throw new \Exception($response->json('message'));
        }

        return $response->json();
    }
}
