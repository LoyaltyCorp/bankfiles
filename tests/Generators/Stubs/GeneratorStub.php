<?php
declare(strict_types=1);

namespace Tests\EoneoPay\BankFiles\Generators\Stubs;

use EoneoPay\BankFiles\Generators\BaseGenerator;

class GeneratorStub extends BaseGenerator
{
    /**
     * @var mixed[]
     */
    private $descriptiveRecord;

    /**
     * @var mixed[]
     */
    private $transactions;

    /**
     * StubGenerator constructor.
     *
     * @param mixed[] $descriptiveRecord
     * @param mixed[] $transactions
     *
     * @throws \EoneoPay\BankFiles\Generators\Exceptions\ValidationFailedException
     * @throws \EoneoPay\BankFiles\Generators\Exceptions\InvalidArgumentException
     * @throws \EoneoPay\BankFiles\Generators\Exceptions\LengthMismatchesException
     */
    public function __construct(array $descriptiveRecord, ?array $transactions = null)
    {
        $this->descriptiveRecord = $descriptiveRecord;
        $this->transactions = $transactions ?? [];

        $this->generate();
        $this->validateLineLengths();
    }

    /**
     * Generate
     *
     * @throws \EoneoPay\BankFiles\Generators\Exceptions\ValidationFailedException
     * @throws \EoneoPay\BankFiles\Generators\Exceptions\InvalidArgumentException
     * @throws \EoneoPay\BankFiles\Generators\Exceptions\LengthMismatchesException
     */
    protected function generate(): void
    {
        $this->writeLinesForObjects($this->transactions);
        /** @var \EoneoPay\BankFiles\Generators\Aba\Objects\DescriptiveRecord $descriptiveRecord */
        $descriptiveRecord = $this->descriptiveRecord;
        $this->validateAttributes($descriptiveRecord, []);
    }

    /**
     * Return the defined line length of a generators
     */
    protected function getLineLength(): int
    {
        return 120;
    }

    /**
     * Check if record length is no more than defined characters
     */
    protected function validateLineLengths(): void
    {
    }
}
