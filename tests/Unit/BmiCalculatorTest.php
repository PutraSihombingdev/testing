<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Services\BmiCalculator;

class BmiCalculatorTest extends TestCase
{
    /** @test */
    public function it_calculates_bmi_correctly()
    {
        $bmi = BmiCalculator::calculate(70, 170);
        $this->assertEquals(24.2, $bmi);
    }

    /** @test */
    public function it_returns_correct_category()
    {
        $this->assertEquals('Kurus', BmiCalculator::category(17));
        $this->assertEquals('Normal', BmiCalculator::category(22));
        $this->assertEquals('Overweight', BmiCalculator::category(27));
        $this->assertEquals('Obesitas', BmiCalculator::category(32));
    }
}
