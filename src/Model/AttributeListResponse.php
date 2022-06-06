<?php

namespace App\Model;

class AttributeListResponse
{
    private $items;

    /**
     * @param $items
     */
    public function __construct(array $items)
    {
        $this->items = $items;
    }

    /**
     * @return array
     */
    public function getItems(): array
    {
        return $this->items;
    }


}
