<?php

namespace App\Cart\Items;

use App\Drinks\Drink;
use App\Users\User;
use Core\DataHolder;

class Item extends DataHolder
{
    protected function setId(int $id)
    {
        $this->id = $id;
    }

    protected function getId(): ?int
    {
        return $this->id ?? null;
    }

    protected function setDrinkId(int $drinkId)
    {
        $this->drink_id = $drinkId;
    }

    protected function getDrinkId(): ?int
    {
        return $this->drink_id ?? null;
    }

    protected function setUserId(int $userId)
    {
        $this->user_id = $userId;
    }

    protected function getUserId(): ?int
    {
        return $this->user_id ?? null;
    }

    public function user(): ?User
    {
        $user = \App\Users\Model::find($this->getUserId());

        if ($user) {
            return $user;
        }

        return null;
    }

    public function drink(): ?Drink
    {
        $drink = \App\Drinks\Model::find($this->getDrinkId());

        if ($drink) {
            return $drink;
        }

        return null;
    }
}