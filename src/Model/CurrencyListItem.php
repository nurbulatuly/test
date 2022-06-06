<?php

namespace App\Model;

class CurrencyListItem
{
    private $name;

    private $attributes;

    /**
     * @param $name
     * @param $attributes
     */
    public function __construct($name, $attributes)
    {
        $this->name = $name;
        $this->attributes = $attributes;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * @param mixed $attributes
     */
    public function setAttributes($attributes): self
    {
        $this->attributes = $attributes;
        return $this;
    }


}
