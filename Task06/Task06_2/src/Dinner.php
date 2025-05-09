<?php

namespace App;

class Dinner extends RoomDecorator
{
    public function getDescription(): string
    {
        return $this->room->getDescription() . ', ужин';
    }

    public function getCost(): int
    {
        return $this->room->getCost() + 800;
    }
}
