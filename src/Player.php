<?php

namespace App;

class Player
{
    public const SCORE_TABLE = ['love', 'fifteen', 'thirty', 'forty'];
    public string $name;
    public int $points = 0;

    /**
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function score()
    {
        $this->points++;
    }

    public function toScore()
    {
        return self::SCORE_TABLE[$this->points];
    }
}