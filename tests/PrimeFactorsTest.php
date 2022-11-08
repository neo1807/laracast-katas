<?php
declare(strict_types=1);

use App\PrimeFactors;
use PHPUnit\Framework\TestCase;

final class PrimeFactorsTest extends TestCase
{
    /**
     * @param $number
     * @param $expected
     * @return void
     * @dataProvider factors
     */
    public function testGeneratesPrimeFactorsFor1($number,$expected)
    {
        $factors = new PrimeFactors();
        $this->assertEquals($expected, $factors->generate($number));
    }

    public function factors(){
        return[
            [1,[]],
            [2,[2]],
            [3,[3]],
            [4,[2,2]],
            [5,[5]],
            [6,[2,3]],
            [7,[7]],
            [8,[2,2,2]],
            [100,[2,2,5,5]],
            [999,[3,3,3,37]]
        ];
    }
}
