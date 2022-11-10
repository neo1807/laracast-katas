<?php

namespace App;

class Item
{
    public int $sellIn;
    public int $quality;

    /**
     * @param int $sellIn
     * @param int $quality
     */
    public function __construct(int $quality, int $sellIn)
    {
        $this->sellIn = $sellIn;
        $this->quality = $quality;
    }

    public function tick()
    {
        $this->sellIn--;

        if ($this->quality > 0) {
            $this->quality--;
        }

        if ($this->sellIn <= 0) {
            $this->quality--;
        }
    }
}