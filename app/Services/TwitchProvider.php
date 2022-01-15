<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use App\Libs\TwitchProvider as Twitch;

class TwitchProvider
{
    private $authServer;
    private $clientID;
    private $clientSecret;
    private $redirectURL;
    private $provider;
    private $channelId;

    public function __construct(Model $config) {
        $this->authServer = "https://id.twitch.tv";
        $this->clientID = $config->get('CLIENT_ID');
        $this->clientSecret = $config->get('CLIENT_SECRET');
        $this->channelId = $config->get('CHANNEL_ID');
        $this->redirectURL = "https://badhabitz.ml";
        $this->provider = new Twitch([
            'channelId'               => $this->channelId,
            'clientId'                => $this->clientID,
            'clientSecret'            => $this->clientSecret,
            'redirectUri'             => $this->redirectURL,
            'scopes'                  => ['whispers:edit', 'whispers:read', 'chat:edit', 'chat:read', 'user_subscriptions']
        ]);
    }

    public function getProvider() {
        return $this->provider;
    }
}
