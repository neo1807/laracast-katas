<?php

use App\Game;
use PHPUnit\Framework\TestCase;

class GameTest extends TestCase
{
    public function testScoresAGutterGameAsZero()
    {
        $game = new Game();
        foreach (range(1, 20) as $roll) {
            $game->roll(0);

        }
        $this->assertSame(0, $game->score());
    }

    public function testScoresAllOnes()
    {
        $game = new Game();
        foreach (range(1, 20) as $roll) {
            $game->roll(1);

        }
        $this->assertSame(20, $game->score());
    }

    public function testAwardsOneRollBonusForSpare()
    {
        $game = new Game();
        $game->roll(5);
        $game->roll(5);
        $game->roll(8);
        foreach (range(1, 17) as $roll) {
            $game->roll(0);

        }
        $this->assertSame(26, $game->score());
    }

    public function testAwardsTwoRollBonusForStrike()
    {
        $game = new Game();
        $game->roll(10);
        $game->roll(5);
        $game->roll(2);
        foreach (range(1, 16) as $roll) {
            $game->roll(0);

        }
        $this->assertSame(24, $game->score());
    }

    public function testASpareOnFinalFrameGrantsOneExtraBall(){
        $game = new Game();

        foreach (range(1, 18) as $roll) {
            $game->roll(0);

        }
        $game->roll(5);
        $game->roll(5);
        $game->roll(5);

        $this->assertSame(15, $game->score());
    }

    public function testAStrikeOnFinalFrameGrantsTwoExtraBalls(){
        $game = new Game();

        foreach (range(1, 18) as $roll) {
            $game->roll(0);

        }
        $game->roll(10);
        $game->roll(10);
        $game->roll(10);

        $this->assertSame(30, $game->score());
    }

    public function testScoresAPerfectGame(){
        $game = new Game();

        foreach (range(1, 12) as $frame) {
            $game->roll(10);

        }

        $this->assertSame(300, $game->score());
    }
}
