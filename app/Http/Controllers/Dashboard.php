<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TwitchProvider;
use App\Services\ButtonsService;

class Dashboard extends Controller {
    private $buttonService;

    public function __construct(Request $request, ButtonsService $btnService) {
        $this->buttonService = $btnService;
    }

    public function index(Request $request, TwitchProvider $twitchProvider) {
        if (!$request->session()->has('access_token')) {
            return redirect('/');
        }
        $accessToken = unserialize(session("access_token"));
        $provider = $twitchProvider->getProvider();
        $resourceOwner = $provider->getResourceOwner($accessToken);
        $user = $resourceOwner->toArray();
//        $subscriber_url = $provider->getResourceOwnerSubscriptionDetailsUrl($user['data'][0]['id']);
//        $subscriber_request = $provider->getAuthenticatedRequest('GET', $subscriber_url, $accessToken);
//        $subscriber = $provider->getParsedResponse($subscriber_request);
//        error_log(print_r($subscriber, 1));
//        $user['data'][0]['subscriber'] = (array_key_exists('status', $subscriber)? 'false' : 'true');
//        error_log(print_r($user, 1));
        $btns_and_cats = $this->buttonService->getAll();
        $btns_and_cats['user']=$user;

        return view('dashboard', $btns_and_cats);
    }
}
