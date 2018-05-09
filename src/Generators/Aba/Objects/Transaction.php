<?php
declare(strict_types=1);

namespace EoneoPay\BankFiles\Generators\Aba\Objects;

use EoneoPay\BankFiles\Generators\BaseObject;
use EoneoPay\BankFiles\Generators\Interfaces\GeneratorInterface;

/**
 * @method string getAccountNumber()
 * @method string getAmount()
 * @method string getAmountOfWithholdingTax()
 * @method string getBsbNumber()
 * @method string getIndicator()
 * @method string getLodgementReference()
 * @method string getNameOfRemitter()
 * @method string getRecordType()
 * @method string getTitleOfAccount()
 * @method string getTraceAccountNumber()
 * @method string getTraceBsb()
 * @method string|int getTransactionCode()
 */
class Transaction extends BaseObject
{
    public const CODE_GENERAL_CREDIT = 50;
    public const CODE_GENERAL_DEBIT = 13;

    /**
     * Get validation rules.
     *
     * @return array
     */
    public function getValidationRules(): array
    {
        return [
            'bsbNumber' => GeneratorInterface::VALIDATION_RULE_BSB,
            'accountNumber' => GeneratorInterface::VALIDATION_RULE_ALPHA,
            'amount' => GeneratorInterface::VALIDATION_RULE_NUMERIC,
            'titleOfAccount' => GeneratorInterface::VALIDATION_RULE_ALPHA,
            'lodgementReference' => GeneratorInterface::VALIDATION_RULE_ALPHA,
            'traceBsb' => GeneratorInterface::VALIDATION_RULE_BSB,
            'traceAccountNumber' => GeneratorInterface::VALIDATION_RULE_ALPHA,
            'nameOfRemitter' => GeneratorInterface::VALIDATION_RULE_ALPHA,
            'amountOfWithholdingTax' => GeneratorInterface::VALIDATION_RULE_NUMERIC
        ];
    }

    /**
     * Get attributes padding configuration as [<attribute> => [<length>, <string>, <type>]].
     * @see http://php.net/manual/en/function.str-pad.php
     *
     * @return array
     */
    protected function getAttributesPaddingRules(): array
    {
        return [
            'accountNumber' => [9, ' ', STR_PAD_LEFT],
            'indicator' => [1],
            'amount' => [10, '0', STR_PAD_LEFT],
            'titleOfAccount' => [32],
            'lodgementReference' => [18],
            'traceAccountNumber' => [9, ' ', STR_PAD_LEFT],
            'nameOfRemitter' => [16],
            'amountOfWithholdingTax' => [8, '0', STR_PAD_LEFT]
        ];
    }

    /**
     * Return object attributes.
     *
     * @return array
     */
    protected function initAttributes(): array
    {
        return [
            'recordType',
            'bsbNumber',
            'accountNumber',
            'indicator',
            'transactionCode',
            'amount',
            'titleOfAccount',
            'lodgementReference',
            'traceBsb',
            'traceAccountNumber',
            'nameOfRemitter',
            'amountOfWithholdingTax'
        ];
    }

    /**
     * Return record type.
     *
     * @return string
     */
    protected function initRecordType(): string
    {
        return '1';
    }
}