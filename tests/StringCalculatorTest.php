<?php


use App\StringCalculator;
use PHPUnit\Framework\TestCase;

class StringCalculatorTest extends TestCase
{
    protected StringCalculator $calculator;

    protected function setUp(): void
    {
        $this->calculator = new StringCalculator();
    }

    /** @test */
    public function it_evaluates_empty_string_as_zero()
    {
        $this->assertSame(0, $this->calculator->add(''));
    }

    /** @test */
    public function it_finds_the_sum_of_a_single_number()
    {
        $this->assertSame(5, $this->calculator->add('5'));
    }

    /** @test */
    public function it_finds_the_sum_of_two_numbers()
    {
        $this->assertSame(10, $this->calculator->add('5,5'));
    }

    /** @test */
    public function it_finds_the_sum_of_any_amount_of_numbers()
    {
        $this->assertSame(20, $this->calculator->add('5,5,5,5'));
    }

    /** @test */
    public function it_accepts_new_line_delimiter()
    {
        $this->assertSame(10, $this->calculator->add("5\n5"));
    }

    /** @test */
    public function it_does_not_allow_negative_numbers()
    {
        $this->expectException(\Exception::class);
        $this->calculator->add('5,-4');
    }

    /** @test */
    public function it_ignores_numbers_greater_than_1000()
    {
        $this->assertSame(10, $this->calculator->add("10,1111"));
    }

    /** @test */
    public function it_supports_custom_delimiters()
    {
        $this->assertSame(10, $this->calculator->add("//:\n5:5"));
    }
}
