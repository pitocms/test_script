<?php 

declare(strict_types=1);

namespace App\CommissionTask\Service;

class WithdrawCommissionFee
{
    public function calculate(string $amount, string $userType): string
    {
        $math = new Math(2);
        switch ($userType) {
            case 'business':
                return $math->divide($math->multiply($amount, '0.5'), '100');
            case 'private':
                return $math->divide($math->multiply($amount, '0.3'), '100');
        }
    }
}
