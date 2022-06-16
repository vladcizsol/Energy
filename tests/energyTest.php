<?php
use PHPUnit\Framework\TestCase;
use Vladcizsol\Energy\Display;

final class ContractsTest extends TestCase
{
    public function testContracts()
    {
    	$contract = new Display();
        $contract->write();
    }
}