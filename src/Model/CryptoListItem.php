<?php

namespace App\Model;

use Doctrine\Common\Collections\ArrayCollection;

class CryptoListItem
{

    private $name;

    private $currencies;

    public function __construct($name, $currencies)
    {
        $this->name = $name;
        $this->currencies = $currencies;
    }


    public function getName()
    {
        return $this->name;
    }

    public function getCurrencies()
    {
        return $this->currencies;
    }
}
