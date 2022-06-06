<?php

namespace App\Service;

use App\Entity\Attribute;
use App\Entity\Currency;
use App\Model\AttributeListitem;
use App\Model\AttributeListResponse;
use App\Repository\AttributeRepository;

class AttributeService
{
    private $attributeRepository;

    public function __construct(AttributeRepository $attributeRepository)
    {
        $this->attributeRepository = $attributeRepository;
    }

    public function addAttributes(array $attributes,Currency $currency):void
    {
        $attributeEntity = new Attribute();
        $attributeEntity->setCurrency($currency);
        $attributeEntity->setPrice($attributes['PRICE']);
        $attributeEntity->setLastUpdate($attributes['LASTUPDATE']);
        $attributeEntity->setLastVolume($attributes['LASTVOLUME']);
        $attributeEntity->setLastVolumeTo($attributes['LASTVOLUMETO']);
        $attributeEntity->setOpenDay($attributes['OPENDAY']);
        $attributeEntity->setHighDay($attributes['HIGHDAY']);
        $attributeEntity->setLowDay($attributes['LOWDAY']);
        $this->attributeRepository->add($attributeEntity,true);
    }

    public function getAttributesByCurrencyAndDate(Currency $currency, $dateFrom, $dateTo): AttributeListResponse
    {
        return new AttributeListResponse(array_map(
            [$this,'map'],
            $this->attributeRepository->findByCurrencyAndDate($currency,$dateFrom,$dateTo)
        ));
    }

    public function map(Attribute $attribute): AttributeListitem
    {
        return new AttributeListitem(
            $attribute->getPrice(),
            $attribute->getLastUpdate(),
            $attribute->getLastVolume(),
            $attribute->getLastVolumeTo(),
            $attribute->getOpenDay(),
            $attribute->getHighDay(),
            $attribute->getLowDay()
        );
    }
}
