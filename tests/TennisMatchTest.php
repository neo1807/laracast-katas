<?php


use App\Player;
use App\TennisMatch;
use PHPUnit\Framework\TestCase;

class TennisMatchTest extends TestCase
{
    /**
     * @dataProvider scores
     */
    public function test_scores_a_tennis_match($playerOnePoints, $playerTwoPoints, $score)
    {
        $match = new TennisMatch(
            $john = new Player('John'),
            $jane = new Player('Jane'),
        );
        for ($i = 0; $i < $playerOnePoints; $i++) {
            $john->score();
        }
        for ($i = 0; $i < $playerTwoPoints; $i++) {
            $jane->score();
        }
        $this->assertEquals($score, $match->score());
    }

    public function scores()
    {
        return [
            [0, 0, 'love-love'],
            [1, 0, 'fifteen-love'],
            [1, 1, 'fifteen-fifteen'],
            [2, 0, 'thirty-love'],
            [2, 2, 'thirty-thirty'],
            [3, 0, 'forty-love'],
            [3, 3, 'deuce'],
            [4, 4, 'deuce'],
            [4, 3, 'Advantage: John'],
            [3, 4, 'Advantage: Jane'],
            [5, 5, 'deuce'],
            [4, 2, 'Winner: John'],
            [1, 4, 'Winner: Jane'],
            [6, 5, 'Advantage: John'],
            [5, 6, 'Advantage: Jane'],
        ];
    }
}
