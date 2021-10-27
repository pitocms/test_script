<?php 

declare(strict_types=1);

namespace App\CommissionTask\Service;

class DepositCommissionFee
{
    public function calculate(string $amount, string $userType): string
    {
        $math = new Math(2);
        return $math->divide($math->multiply($amount, '0.03'), '100');
    }
}
