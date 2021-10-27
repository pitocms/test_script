<?php

declare(strict_types=1);

namespace App\CommissionTask\Service;

class CommissionFee
{
    public function calculate(string $amount, string $operationType, string $userType): string
    {
        switch ($operationType) {
            case 'deposit':
                return (new DepositCommissionFee())->calculate($amount, $userType);
            case 'withdraw':
                return (new WithdrawCommissionFee())->calculate($amount, $userType);
        }
    }
}
