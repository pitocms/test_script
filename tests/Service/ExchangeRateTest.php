<?php

declare(strict_types=1);

namespace App\CommissionTask\Tests\Service;

use PHPUnit\Framework\TestCase;
use App\CommissionTask\Service\ExchangeRate;

class ExchangeRateTest extends TestCase
{
    /**
     * @var ExchangeRate
     */
    private $exchangeRate;

    public function setUp(): void
    {
        $this->exchangeRate = new ExchangeRate();
    }

    /**
     * @param string $amount
     * @param string $expectation
     *
     * @dataProvider dataProviderForForTesting
     */
    public function testFor(string $currency, ?string $expectation)
    {
        $this->assertEquals(
            $expectation,
            $this->exchangeRate->for($currency)
        );
    }

    public function dataProviderForForTesting(): array
    {
        return [
            'exchange rate for usd' => ['usd', null],
            'exchange rate for aud' => ['aud', null],
        ];
    }
}
