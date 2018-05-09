<?php
declare(strict_types=1);

namespace EoneoPay\BankFiles\Parsers\Nai;

trait AccountSummaryCodes
{
    /** @var array $codeSummary */
    private static $codeSummary = [
        '001' => 'Customer number',
        '003' => 'Number of segments for the account',
        '010' => 'Opening Balance',
        '015' => 'Closing balance',
        '100' => 'Total credits',
        '102' => 'Number of credit transactions',
        '400' => 'Total debits',
        '402' => 'Number of debit transactions',
        '500' => 'Accrued (unposted) credit interest',
        '501' => 'Accrued (unposted) debit interest',
        '502' => 'Account limit',
        '503' => 'Available limit',
        '965' => 'Effective Debit interest rate',
        '966' => 'Effective Credit interest rate',
        '967' => 'Accrued State Government Duty',
        '968' => 'Accrued Government Credit Tax',
        '969' => 'Accrued Government Debit Tax'
    ];

    /**
     * Return code summary
     *
     * @param string $code
     *
     * @return string|null
     */
    public function getCodeSummary(string $code): ?string
    {
        return static::$codeSummary[$code] ?? null;
    }
}