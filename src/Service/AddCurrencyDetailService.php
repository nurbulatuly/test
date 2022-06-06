<?php

namespace App\Service;

use App\Service\AttributeService;
use App\Service\CryptoService;
use App\Service\CurrencyService;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class AddCurrencyDetailService
{
    private $client;
    private $cryptoService;
    private $currencyService;
    private $attributeService;

    public function __construct( HttpClientInterface $client,
                                 CryptoService $cryptoService,
                                 CurrencyService $currencyService,
                                 AttributeService $attributeService)
    {
        $this->client = $client;
        $this->cryptoService = $cryptoService;
        $this->currencyService = $currencyService;
        $this->attributeService = $attributeService;
    }

    public function addCurrencyDetail(): void
    {
        $response = $this->client->request(
            'GET',
            "https://min-api.cryptocompare.com/data/pricemultifull?api_key=".$_ENV['CRYPTO_API_KEY']."&fsyms=".$_ENV['CRYPTO_NAMES']."&tsyms=".$_ENV['CRYPTO_CURRENCIES']
        );

        $content = $response->toArray();
        $cryptoes = array_keys($content['RAW']);
        foreach ($cryptoes as $cryptoName){
//            Найти крипту по названию либо создать ее
            $crypto = $this->cryptoService->getCrypto($cryptoName);
//            Валюты крипты
            $cryptoCurrencies = array_keys($content['RAW'][$cryptoName]);
            foreach ($cryptoCurrencies as $cryptoCurrencyName){
//                Найти валюту по названию либо создать ее
                $currency = $this->currencyService->getCurrency($cryptoCurrencyName, $crypto);
//                Атрибуты валюты
                $attributes = $content['RAW'][$cryptoName][$cryptoCurrencyName];
//                Добавить атрибуты для валюты
                $this->attributeService->addAttributes($attributes,$currency);
            }
        }
    }
}
