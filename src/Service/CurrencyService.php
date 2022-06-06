<?php

namespace App\Service;

use App\Entity\Currency;
use App\Entity\Crypto;
use App\Model\CurrencyListItem;
use App\Model\CurrencyListResponse;
use App\Repository\CryptoRepository;
use App\Repository\CurrencyRepository;

class CurrencyService
{
    private $currencyRepository;
    private $attributeService;

    public function __construct(CurrencyRepository $currencyRepository, AttributeService $attributeService)
    {
        $this->currencyRepository = $currencyRepository;
        $this->attributeService = $attributeService;
    }

    public function getCurrency(string $name, Crypto $crypto): Currency
    {
        $currency = $this->currencyRepository->findOneBy([
            'name'=>$name,
            'crypto'=>$crypto
        ]);

        if (!$currency){
            $currencyEntity = new Currency();
            $currencyEntity->setName($name);
            $currencyEntity->setSlug(strtolower($name));
            $currencyEntity->setCrypto($crypto);
            $this->currencyRepository->add($currencyEntity,true);

            $currency = $currencyEntity;
        }

        return $currency;
    }

    public function getCurrenciesByCrypto(Crypto $crypto,$dateFrom,$dateTo): CurrencyListResponse
    {
        return new CurrencyListResponse(array_map(
            function (Currency $currency) use ($dateFrom,$dateTo) {
                return (new CurrencyListItem($currency->getName(),$this->attributeService->getAttributesByCurrencyAndDate($currency,$dateFrom,$dateTo)));
            },
            $this->currencyRepository->findByCrypto($crypto)
        ));
    }
}
