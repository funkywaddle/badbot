<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Services\TwitchProvider;
use Illuminate\Http\Request;

class Sendmessage extends Controller {

    private $config;

    public function __construct(Config $config) {
        $this->config = $config;
    }

    public function index(Request $request, TwitchProvider $twitchProvider) {
        try {
            $accessToken = unserialize(session("access_token"));
            $provider = $twitchProvider->getProvider();
            $resourceOwner = $provider->getResourceOwner($accessToken);
            $user = $resourceOwner->toArray();
            $token = $accessToken->getToken();

//            $message = file_get_contents("php://input");
//            $message = json_decode($message);

            $bot = $this->config->get('BOT_NICK');
            $nickname = $user["data"][0]["display_name"];

            $fnick = "NICK " . $nickname . "\r\n";
            $fpriv = "PRIVMSG #jtv :/w " . $bot . " " . $request->command . "\r\n";

            $socket = fsockopen("irc.chat.twitch.tv", 6667);

            fputs($socket, "PASS oauth:" . $token . "\r\n");
            fputs($socket, $fnick);

            fputs($socket, $fpriv);
        } catch (\Exception $e) {
            session_destroy();
        }
    }
}
