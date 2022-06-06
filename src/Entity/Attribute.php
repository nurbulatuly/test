<?php

namespace App\Entity;

use App\Repository\AttributeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AttributeRepository::class)
 */
class Attribute
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="decimal")
     */
    private $price;

    /**
     * @ORM\Column(type="integer")
     */
    private $lastUpdate;

    /**
     * @ORM\Column(type="decimal")
     */
    private $lastVolume;

    /**
     * @ORM\Column(type="decimal")
     */
    private $lastVolumeTo;

    /**
     * @ORM\Column(type="decimal")
     */
    private $openDay;

    /**
     * @ORM\Column(type="decimal")
     */
    private $highDay;


    /**
     * @ORM\Column(type="decimal")
     */
    private $lowDay;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Currency", inversedBy="attributes")
     */
    private $currency;



    public function getId(): ?int
    {
        return $this->id;
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
    public function setPrice($price): void
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getLastUpdate()
    {
        return $this->lastUpdate;
    }

    /**
     * @param mixed $lastUpdate
     */
    public function setLastUpdate($lastUpdate): void
    {
        $this->lastUpdate = $lastUpdate;
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
    public function setLastVolume($lastVolume): void
    {
        $this->lastVolume = $lastVolume;
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
    public function setLastVolumeTo($lastVolumeTo): void
    {
        $this->lastVolumeTo = $lastVolumeTo;
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
    public function setOpenDay($openDay): void
    {
        $this->openDay = $openDay;
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
    public function setHighDay($highDay): void
    {
        $this->highDay = $highDay;
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
    public function setLowDay($lowDay): void
    {
        $this->lowDay = $lowDay;
    }

    public function getCurrency(): ?Currency
    {
        return $this->currency;
    }

    public function setCurrency(?Currency $currency): self
    {
        $this->currency = $currency;

        return $this;
    }

}
