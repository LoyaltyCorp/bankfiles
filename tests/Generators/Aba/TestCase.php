<?php
declare(strict_types=1);

namespace Tests\EoneoPay\BankFiles\Generators\Aba;

use EoneoPay\BankFiles\Generators\Aba\Objects\DescriptiveRecord;
use EoneoPay\BankFiles\Generators\Aba\Objects\FileTotalRecord;
use EoneoPay\BankFiles\Generators\Aba\Objects\Transaction;
use Tests\EoneoPay\BankFiles\Generators\TestCase as GeneratorTestCase;

class TestCase extends GeneratorTestCase
{
    /**
     * Create a DescriptiveRecord object with default attributes
     *
     * @return DescriptiveRecord
     */
    protected function createDescriptiveRecord(): DescriptiveRecord
    {
        return new DescriptiveRecord([
            'reelSequenceNumber' => '01',
            'userFinancialInstitution' => 'UFI',
            'nameOfUserSupplyingFile' => 'LOYALTY CORP AUSTRALIA',
            'numberOfUserSupplyingFile' => 492627,
            'descriptionOfEntries' => 'PAYMENTS',
            'dateToBeProcessed' => '100817'
        ]);
    }

    /**
     * Create File Total Record object with default values
     *
     * @return FileTotalRecord
     */
    protected function createFileTotalRecord(): FileTotalRecord
    {
        return new FileTotalRecord([
            'fileUserNetTotalAmount' => '0',
            'fileUserCreditTotalAmount' => '43452',
            'fileUserDebitTotalAmount' => '43452',
            'fileUserCountOfRecordsType' => '2'
        ]);
    }

    /**
     * Create a Transaction object with default values
     *
     * @return Transaction
     */
    protected function createTransaction(): Transaction
    {
        return new Transaction([
            'bsbNumber' => '083-163',
            'accountNumber' => '1234356',
            'transactionCode' => Transaction::CODE_GENERAL_CREDIT,
            'amount' => '0000043452',
            'titleOfAccount' => 'TRUST ME',
            'lodgementReference' => '0049e2d7dd1288d086',
            'traceBsb' => '083-170',
            'traceAccountNumber' => '739827524',
            'nameOfRemitter' => 'TEST PAY RENT RE',
            'amountOfWithholdingTax' => '00000000'
        ]);
    }
}