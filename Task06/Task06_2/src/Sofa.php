<?php

namespace App;

class Sofa extends RoomDecorator
{
    public function getDescription(): string
    {
        return $this->room->getDescription() . ', дополнительный диван';
    }

    public function getCost(): int
    {
        return $this->room->getCost() + 500;
    }
}
