<?php

namespace App;

use App\RoomInterface;

abstract class RoomDecorator implements RoomInterface
{
    protected RoomInterface $room;

    public function __construct(RoomInterface $room)
    {
        $this->room = $room;
    }

    abstract public function getDescription(): string;
    abstract public function getCost(): int;
}
