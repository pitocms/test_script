<?php

declare(strict_types=1);

namespace App\CommissionTask\Service;

use GuzzleHttp\Client;

class ExchangeRate
{
    private $rates = [];

    public function __construct()
    {
        $client = new Client(['base_uri' => 'http://api.exchangeratesapi.io/v1/']);
        $response = $client->get('latest', ['query' => ['access_key' => 'bb313f7a8cc773f796583f5a1abe24c4']]);
        $data = json_decode($response->getBody()->getContents(), true);
        $this->rates = $data['rates'];
    }

    public function for(string $currency): ?float
    {
        return $this->rates[$currency];
    }
}
