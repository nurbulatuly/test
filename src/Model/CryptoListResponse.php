<?php

namespace App\Model;

class CryptoListResponse
{
    private $items;

    public function __construct(array $items)
    {
        $this->items = $items;
    }

    /**
     * @return CryptoListItem[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

}
