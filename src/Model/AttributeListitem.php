<?php

namespace App\Model;

class AttributeListitem
{
    private $price;

    private $lustUpdate;

    private $lastVolume;

    private $lastVolumeTo;

    private $openDay;

    private $highDay;

    private $lowDay;

    /**
     * @param $price
     * @param $lustUpdate
     * @param $lastVolume
     * @param $lastVolumeTo
     * @param $openDay
     * @param $highDay
     * @param $lowDay
     */
    public function __construct($price, $lustUpdate, $lastVolume, $lastVolumeTo, $openDay, $highDay, $lowDay)
    {
        $this->price = $price;
        $this->lustUpdate = $lustUpdate;
        $this->lastVolume = $lastVolume;
        $this->lastVolumeTo = $lastVolumeTo;
        $this->openDay = $openDay;
        $this->highDay = $highDay;
        $this->lowDay = $lowDay;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price): self
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLustUpdate()
    {
        return $this->lustUpdate;
    }

    /**
     * @param mixed $lustUpdate
     */
    public function setLustUpdate($lustUpdate): self
    {
        $this->lustUpdate = $lustUpdate;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLastVolume()
    {
        return $this->lastVolume;
    }

    /**
     * @param mixed $lastVolume
     */
    public function setLastVolume($lastVolume): self
    {
        $this->lastVolume = $lastVolume;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLastVolumeTo()
    {
        return $this->lastVolumeTo;
    }

    /**
     * @param mixed $lastVolumeTo
     */
    public function setLastVolumeTo($lastVolumeTo): self
    {
        $this->lastVolumeTo = $lastVolumeTo;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getOpenDay()
    {
        return $this->openDay;
    }

    /**
     * @param mixed $openDay
     */
    public function setOpenDay($openDay): self
    {
        $this->openDay = $openDay;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getHighDay()
    {
        return $this->highDay;
    }

    /**
     * @param mixed $highDay
     */
    public function setHighDay($highDay): self
    {
        $this->highDay = $highDay;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLowDay()
    {
        return $this->lowDay;
    }

    /**
     * @param mixed $lowDay
     */
    public function setLowDay($lowDay): self
    {
        $this->lowDay = $lowDay;

        return $this;
    }

}
