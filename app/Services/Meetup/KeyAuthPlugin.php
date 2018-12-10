<?php

namespace App\Services\Meetup;

class KeyAuthPlugin
{
    /** @var string */
    protected $apiKey;

    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public static function getSubscribedEvents()
    {
        return [
            'request.before_send' => ['onRequestBeforeSend', -1000],
        ];
    }

    public function onRequestBeforeSend(Event $event)
    {
        $request = $event['request'];

        $this->signRequest($request);
    }

    protected function signRequest($request)
    {
        $url = $request->getUrl(true);

        $url->getQuery()->add('key', $this->apiKey);

        $request->setUrl($url);
    }
}