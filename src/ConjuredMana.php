<?php

namespace App;

class ConjuredMana extends Item
{
    public function tick()
    {
        $this->sellIn--;

        if ($this->quality > 0) {
            $this->quality -= 2;
        }

        if ($this->sellIn <= 0 && $this->quality > 0) {
            $this->quality -= 2;
        }
    }
}