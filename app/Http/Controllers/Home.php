<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TwitchProvider;

class Home extends Controller {

    public function index(Request $request, TwitchProvider $twitchProvider) {
        if ($request->session()->has('access_token')) {
            return redirect('dashboard');
        }

        $provider = $twitchProvider->getProvider();

        if(!isset($request->code)){
            $authorizationUrl = $provider->getAuthorizationUrl();
            session(['oauth2state'=> $provider->getState()]);

            return view('login', ['authorizationUrl'=>$authorizationUrl]);
        } elseif(empty($request->state) || ( session()->has('oauth2state') && $request->state !== session('oauth2state'))) {
            if (session()->has('oauth2state')) {
                session()->forget('oauth2state');
            }
            exit('Invalid state');
        } else {
            // Get an access token using authorization code grant.
            $accessToken = $provider->getAccessToken('authorization_code', [
                'code' => $request->code
            ]);

            session([
                'access_token'=>serialize($accessToken),
                'token'=>$accessToken->getToken(),
                'refresh_token'=>$accessToken->getRefreshToken()
            ]);

            return redirect("dashboard");
        }
    }
}
