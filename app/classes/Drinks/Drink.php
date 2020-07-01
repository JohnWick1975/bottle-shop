<?php

namespace App\Drinks;

use Core\DataHolder;

class Drink extends DataHolder
{
    protected function setId(int $id)
    {
        $this->id = $id;
    }

    protected function getId()
    {
        return $this->id ?? null;
    }

    protected function setName(string $name)
    {
        $this->name = $name;
    }

    protected function getName()
    {
        return $this->name ?? null;
    }

    protected function setPercentage(int $percentage)
    {
        $this->percentage = $percentage;
    }

    protected function getPercentage()
    {
        return $this->percentage ?? null;
    }

    protected function setSize(int $size)
    {
        $this->size = $size;
    }

    protected function getSize()
    {
        return $this->size ?? null;
    }

    protected function setAmount(int $amount)
    {
        $this->amount = $amount;
    }

    protected function getAmount()
    {
        return $this->amount ?? null;
    }

    protected function setPrice(int $price)
    {
        $this->price = $price;
    }

    protected function getPrice()
    {
        return $this->price ?? null;
    }

    protected function setImage(string $image)
    {
        $this->image = $image;
    }

    protected function getImage()
    {
        return $this->image ?? null;
    }
}