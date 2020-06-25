<?php

namespace App\Pixels;

use Core\DataHolder;

class Pixel extends DataHolder
{
    protected function setId(int $id)
    {
        $this->id = $id;
    }

    protected function getId()
    {
        return $this->id ?? null;
    }

    protected function setX(int $x)
    {
        $this->x = $x;
    }

    protected function getX()
    {
        return $this->x ?? null;
    }

    protected function setY(int $y)
    {
        $this->y = $y;
    }

    protected function getY()
    {
        return $this->y ?? null;
    }

    protected function setColor(string $color)
    {
        $this->color = $color;
    }

    protected function getColor()
    {
        return $this->color ?? null;
    }

    protected function setEmail(string $email)
    {
        $this->email = $email;
    }

    protected function getEmail()
    {
        return $this->email ?? null;
    }

}