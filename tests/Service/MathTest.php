<?php

declare(strict_types=1);

namespace App\CommissionTask\Tests\Service;

use PHPUnit\Framework\TestCase;
use App\CommissionTask\Service\Math;

class MathTest extends TestCase
{
    /**
     * @var Math
     */
    private $math;

    public function setUp(): void
    {
        $this->math = new Math(2);
    }

    /**
     * @param string $leftOperand
     * @param string $rightOperand
     * @param string $expectation
     *
     * @dataProvider dataProviderForAddTesting
     */
    public function testAdd(string $leftOperand, string $rightOperand, string $expectation)
    {
        $this->assertEquals(
            $expectation,
            $this->math->add($leftOperand, $rightOperand)
        );
    }

    public function dataProviderForAddTesting(): array
    {
        return [
            'add 2 natural numbers' => ['1', '2', '3.00'],
            'add negative number to a positive' => ['-1', '2', '1.00'],
            'add natural number to a float' => ['1', '1.05123', '2.05'],
        ];
    }

    /**
     * @param string $leftOperand
     * @param string $rightOperand
     * @param string $expectation
     *
     * @dataProvider dataProviderForDivideTesting
     */
    public function testDivide(string $leftOperand, string $rightOperand, string $expectation)
    {
        $this->assertEquals(
            $expectation,
            $this->math->divide($leftOperand, $rightOperand)
        );
    }

    public function dataProviderForDivideTesting(): array
    {
        return [
            'integer quotient with no remainder' => ['6', '2', '3.00'],
            'float quotient with remainder' => ['5', '2', '2.50'],
        ];
    }

    /**
     * @param string $leftOperand
     * @param string $rightOperand
     * @param string $expectation
     *
     * @dataProvider dataProviderForMultiplyTesting
     */
    public function testMultiply(string $leftOperand, string $rightOperand, string $expectation)
    {
        $this->assertEquals(
            $expectation,
            $this->math->multiply($leftOperand, $rightOperand)
        );
    }

    public function dataProviderForMultiplyTesting(): array
    {
        return [
            'multiply two integer' => ['5', '3', '15.00'],
            'multiply two float' => ['5.5', '5.5', '30.25'],
        ];
    }
}
