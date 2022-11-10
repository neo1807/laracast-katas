<?php

namespace App;

class TennisMatch
{
    protected Player $playerOne;
    protected Player $playerTwo;

    public function __construct(Player $playerOne, Player $playerTwo)
    {
        $this->playerOne = $playerOne;
        $this->playerTwo = $playerTwo;
    }

    public function score(): string
    {
        if ($this->hasWinner()) {
            return 'Winner: ' . $this->leader()->name;
        }

        if ($this->isDeuce()) {
            return 'deuce';
        }

        if ($this->advantage()) {
            return 'Advantage: ' . $this->leader()->name;
        }

        return sprintf(
            "%s-%s",
            $this->playerOne->toScore(),
            $this->playerTwo->toScore()
        );
    }

    public function hasWinner(): bool
    {
        return (
            ($this->playerOne->points > 3 && $this->playerOne->points >= $this->playerTwo->points + 2) ||
            ($this->playerTwo->points > 3 && $this->playerTwo->points >= $this->playerOne->points + 2)
        );
    }

    public function leader()
    {
        if ($this->playerOne->points > $this->playerTwo->points) {
            return $this->playerOne;
        }
        if ($this->playerTwo->points > $this->playerOne->points) {
            return $this->playerTwo;
        }
    }

    public function gamePoint()
    {
        return $this->playerOne->points >= 3 && $this->playerTwo->points >= 3;
    }

    public function isDeuce(): bool
    {
        return $this->gamePoint() && $this->playerOne->points === $this->playerTwo->points;
    }

    public function advantage()
    {
        if ($this->gamePoint()) {
            return !$this->isDeuce();
        }
        return false;
    }
}