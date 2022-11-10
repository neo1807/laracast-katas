<?php


use App\StringCalculator;
use PHPUnit\Framework\TestCase;

class StringCalculatorTest extends TestCase
{
    public function test_evaluates_empty_string_as_zero()
    {
        $calculator = new StringCalculator();
        $this->assertSame(0, $calculator->add(''));
    }

    public function test_finds_the_sum_of_a_single_number()
    {
        $calculator = new StringCalculator();
        $this->assertSame(5, $calculator->add('5'));
    }

    public function test_finds_the_sum_of_two_numbers()
    {
        $calculator = new StringCalculator();
        $this->assertSame(10, $calculator->add('5,5'));
    }

    public function test_finds_the_sum_of_any_amount_of_numbers()
    {
        $calculator = new StringCalculator();
        $this->assertSame(20, $calculator->add('5,5,5,5'));
    }

    public function test_accepts_new_line_delimiter()
    {
        $calculator = new StringCalculator();
        $this->assertSame(10, $calculator->add("5\n5"));
    }

    public function test_negative_numbers_not_allowed()
    {
        $calculator = new StringCalculator();
        $this->expectException(\Exception::class);
        $calculator->add('5,-4');
    }

    public function test_numbers_greater_than_1000_are_ignored()
    {
        $calculator = new StringCalculator();
        $this->assertSame(10, $calculator->add("10,1111"));
    }
    public function test_supports_custom_delimiters()
    {
        $calculator = new StringCalculator();
        $this->assertSame(10, $calculator->add("//:\n5:5"));
    }
}
