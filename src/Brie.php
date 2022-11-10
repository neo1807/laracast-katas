<?php

namespace App;

class Brie extends Item
{
    public function tick()
    {
        $this->sellIn--;

        if ($this->quality < 50) {
            $this->quality++;
        }

        if ($this->sellIn <= 0 && $this->quality < 50) {
            $this->quality++;
        }
    }
}