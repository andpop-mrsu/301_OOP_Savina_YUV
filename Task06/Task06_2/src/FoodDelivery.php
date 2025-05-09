<?php

namespace App;

class FoodDelivery extends RoomDecorator
{
    public function getDescription(): string
    {
        return $this->room->getDescription() . ', доставка еды в номер';
    }

    public function getCost(): int
    {
        return $this->room->getCost() + 300;
    }
}
