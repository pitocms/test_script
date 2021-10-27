<?php

declare(strict_types=1);

namespace App\CommissionTask\Tests\Service;

use PHPUnit\Framework\TestCase;
use App\CommissionTask\Service\DepositCommissionFee;

class DepositCommissionFeeTest extends TestCase
{
    /**
     * @var DepositCommissionFee
     */
    private $depositCommissionFee;

    public function setUp(): void
    {
        $this->depositCommissionFee = new DepositCommissionFee();
    }

    /**
     * @param string $amount
     * @param string $userType
     * @param string $expectation
     *
     * @dataProvider dataProviderForCalculateTesting
     */
    public function testCalculate(string $amount, string $userType, string $expectation)
    {
        $this->assertEquals(
            $expectation,
            $this->depositCommissionFee->calculate($amount, $userType)
        );
    }

    public function dataProviderForCalculateTesting(): array
    {
        return [
            'withdraw commission fee for business client' => ['10', 'business', '0.00'],
            'withdraw commission fee for private client' => ['10', 'private', '0.00'],
        ];
    }
}
