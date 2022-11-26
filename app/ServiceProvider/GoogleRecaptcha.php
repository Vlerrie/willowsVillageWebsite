<?php


namespace App\ServiceProvider;


use GuzzleHttp\Client;

class GoogleRecaptcha
{
    protected $googleAPI = 'https://www.google.com/recaptcha/api/siteverify';
    private $secret;

    public function __construct()
    {
        $this->secret = env('GOOGLE_RECAP_SECRET');
    }

    public function verifyRequest($token, $ip)
    {
        $client = new Client();

        $r = $client->request('POST', $this->googleAPI, [
            'form_params' => [
                'secret' => $this->secret,
                'response' => $token,
                'remoteip' => $ip
            ]
        ]);

        return json_decode($r->getBody()->getContents());
    }

    private function verifyStatus()
    {
        if (!isset($this->secret)) {
            throw new \Exception('No Secret Key Found');
        }
        if (!isset($this->responseToken)) {
            throw new \Exception('No Response Token Found');
        }
    }
}
