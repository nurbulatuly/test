<?php

namespace App\Service;

use App\Entity\Crypto;
use App\Model\CryptoListItem;
use App\Model\CryptoListResponse;
use App\Repository\CryptoRepository;
use App\Repository\CurrencyRepository;

class CryptoService
{
    private $cryptoRepository;
    private $currencyService;

    public function __construct(CryptoRepository $cryptoRepository, CurrencyService $currencyService)
    {
        $this->cryptoRepository = $cryptoRepository;
        $this->currencyService = $currencyService;
    }

    public function getCrypto(string $name): Crypto
    {
        $crypto = $this->cryptoRepository->findOneBy(['name' => $name]);

        if (!$crypto){
            $cryptoEntity = new Crypto();
            $cryptoEntity->setName($name);
            $cryptoEntity->setSlug(strtolower($name));
            $this->cryptoRepository->add($cryptoEntity,true);

            $crypto = $cryptoEntity;
        }

        return $crypto;
    }

    public function getAllCryptos($name,$dateFrom,$dateTo): CryptoListResponse
    {
        $cryptos = $this->cryptoRepository->findByName($name);

        return new CryptoListResponse(array_map(
            function(Crypto $crypto) use ($dateFrom,$dateTo) {
                return (new CryptoListItem($crypto->getName(),$this->currencyService->getCurrenciesByCrypto($crypto,$dateFrom,$dateTo)));
            },$cryptos
        ));
    }

}
