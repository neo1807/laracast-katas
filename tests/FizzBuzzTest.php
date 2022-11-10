<?php


use App\FizzBuzz;
use PHPUnit\Framework\TestCase;

class FizzBuzzTest extends TestCase
{
    public function testReturnsFizzForMultiplesOfThree()
    {
        foreach ([3,6,9,12] as $number){
            $this->assertEquals('fizz', FizzBuzz::convert($number));
        }

    }
    public function testReturnsBuzzForMultiplesOfFive()
    {
        foreach ([5,10,20,25] as $number){
            $this->assertEquals('buzz', FizzBuzz::convert($number));
        }

    }
    public function testReturnsFizzBuzzForMultiplesOfThreeAndFive()
    {
        foreach ([15,30,45,60] as $number){
            $this->assertEquals('fizzbuzz', FizzBuzz::convert($number));
        }

    }
    public function testReturnsNumberNotDivisibleByThreeOrFive()
    {
        foreach ([1,2,4,7,11] as $number){
            $this->assertEquals($number, FizzBuzz::convert($number));
        }

    }
}
