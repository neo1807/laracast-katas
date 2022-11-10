<?php

namespace App;

class GildedRose
{
    public static function of($name, $quality, $sellIn)
    {
        return match ($name) {
            'normal' => new Item($quality, $sellIn),
            'Aged Brie' => new Brie($quality, $sellIn),
            'Sulfuras, Hand of Ragnaros' => new Sulfuras($quality, $sellIn),
            'Backstage passes to a TAFKAL80ETC concert' => new BackstagePasses($quality, $sellIn),
            'Conjured Mana Cake'=> new ConjuredMana($quality,$sellIn)
        };
    }
}
