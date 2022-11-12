<?php
declare(strict_types=1);

use App\BowlingGame;
use PHPUnit\Framework\TestCase;

class BowlingGameTest extends TestCase
{
    protected BowlingGame $game;

    protected function setUp(): void
    {
        $this->game = new BowlingGame();
    }

    /** @test */
    public function it_scores_a_gutter_game_as_zero()
    {
        foreach (range(1, 20) as $roll) {
            $this->game->roll(0);
        }

        $this->assertSame(0, $this->game->score());
    }

    /** @test */
    public function it_scores_all_ones()
    {
        foreach (range(1, 20) as $roll) {
            $this->game->roll(1);
        }

        $this->assertSame(20, $this->game->score());
    }

    /** @test */
    public function it_awards_one_roll_bonus_for_spare()
    {
        $this->game->roll(5);
        $this->game->roll(5);
        $this->game->roll(8);
        foreach (range(1, 17) as $roll) {
            $this->game->roll(0);
        }

        $this->assertSame(26, $this->game->score());
    }

    /** @test */
    public function it_awards_two_roll_bonus_for_strike()
    {
        $this->game->roll(10);
        $this->game->roll(5);
        $this->game->roll(2);
        foreach (range(1, 16) as $roll) {
            $this->game->roll(0);
        }

        $this->assertSame(24, $this->game->score());
    }

    /** @test */
    public function it_grants_one_extra_ball_for_a_spare_on_final_frame()
    {
        foreach (range(1, 18) as $roll) {
            $this->game->roll(0);
        }
        $this->game->roll(5);
        $this->game->roll(5);
        $this->game->roll(5);

        $this->assertSame(15, $this->game->score());
    }

    /** @test */
    public function it_grants_two_extra_balls_for_a_strike_on_final_frame()
    {
        foreach (range(1, 18) as $roll) {
            $this->game->roll(0);
        }
        $this->game->roll(10);
        $this->game->roll(10);
        $this->game->roll(10);

        $this->assertSame(30, $this->game->score());
    }

    /** @test */
    public function it_scores_a_perfect_game()
    {
        foreach (range(1, 12) as $frame) {
            $this->game->roll(10);
        }

        $this->assertSame(300, $this->game->score());
    }
}
