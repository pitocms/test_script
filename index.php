<?php

require_once realpath('vendor/autoload.php');

use App\CommissionTask\Service\CommissionFee;
use App\CommissionTask\Service\Csv;
use App\CommissionTask\Service\ExchangeRate;

$exchangeRate = new ExchangeRate();

$commissionFee = new CommissionFee();

$data = Csv::import($argv[1]);

$withdrawnCount = [];

$transactionCount = [];

foreach ($data as &$line) {
    if ($line[2] === 'private' && $line[3] === 'withdraw') {
        $line[6] = date('Y-m-d', strtotime('previous monday', strtotime($line[0])));
        $line[7] = date('Y-m-d', strtotime('next sunday', strtotime($line[0])));
        $line[8] = sprintf('%s:%s', $line[6], $line[7]);
        $transactionCount[$line[1]][$line[8]]++;
        $line[9] = $transactionCount[$line[1]][$line[8]];
        if ($line[9] === 1) {
            $withdrawnCount[$line[1]][$line[8]] = 1000;
        }
        if ($line[5] !== 'EUR') {
            $rate = $exchangeRate->for($line[5]);
            $line[4] = $line[4] / $rate;
        }
        $line[10] = $line[4] - $withdrawnCount[$line[1]][$line[8]];
        if ($line[10] < 0) {
            $line[10] = 0;
        }
        $withdrawnCount[$line[1]][$line[8]] -= $line[4];
        $line[11] = $line[4];
        $line[4] = $line[10];
        if ($withdrawnCount[$line[1]][$line[8]] < 0) {
            $withdrawnCount[$line[1]][$line[8]] = 0;
        }
        if ($line[5] !== 'EUR') {
            $rate = $exchangeRate->for($line[5]);
            $line[4] = $line[4] * $rate;
        }
    }
    echo $commissionFee->calculate($line[4], $line[3], $line[2]);
    echo PHP_EOL;
}
