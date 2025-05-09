<?php

namespace App;

class Internet extends RoomDecorator
{
    public function getDescription(): string
    {
        return $this->room->getDescription() . ', выделенный Интернет';
    }

    public function getCost(): int
    {
        return $this->room->getCost() + 100;
    }
}
