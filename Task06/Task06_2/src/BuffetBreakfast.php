<?php

namespace App;

class BuffetBreakfast extends RoomDecorator
{
    public function getDescription(): string
    {
        return $this->room->getDescription() . ', завтрак "шведский стол"';
    }

    public function getCost(): int
    {
        return $this->room->getCost() + 500;
    }
}
