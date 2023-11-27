<?php

use PHPUnit\Framework\TestCase;

require 'rendu.php'; // Assurez-vous de spécifier le chemin correct

class FunctionsTest extends TestCase
{
    public function testRenduAvecDenominationsParDefaut()
    {
        $totalAmount = 17;
        $expectedResult = "10 + 5 + 2";
        $result = rendu($totalAmount);

        $this->assertEquals($expectedResult, $result);
    }

    public function testRenduAvecDenominationsPersonnalisees()
    {
        $totalAmount = 27;
        $denominations = [5, 10, 25];
        $expectedResult = "25 + 2";
        $result = rendu($totalAmount, $denominations);

        $this->assertEquals($expectedResult, $result);
    }

    public function testExceptionPourMontantImpossible()
    {
        $this->expectException(\Exception::class);

        $totalAmount = 7;
        $denominations = [2, 5, 10];

        rendu($totalAmount, $denominations);
    }

    public function testRenduPourMontant10()
    {
        $totalAmount = 10;
        $denominations = [2, 5, 10];
        $expectedResult = "10";
        $result = rendu($totalAmount);

        $this->assertEquals($expectedResult, $result);
    }

    public function testRenduPourMontant11()
    {
        $totalAmount = 11;
        $denominations = [2, 5, 10];
        $expectedResult = "5 + 5 + 1";
        $result = rendu($totalAmount, $denominations);

        $this->assertEquals($expectedResult, $result);
    }

    public function testRenduPourMontant21()
    {
        $totalAmount = 21;
        $expectedResult = "10 + 10 + 1";
        $result = rendu($totalAmount);

        $this->assertEquals($expectedResult, $result);
    }

    public function testRenduPourMontant23()
    {
        $totalAmount = 23;
        $expectedResult = "10 + 10 + 2 + 1";
        $result = rendu($totalAmount);

        $this->assertEquals($expectedResult, $result);
    }

    public function testRenduPourMontant31()
    {
        $totalAmount = 31;
        $denominations = [2, 5, 10];
        $expectedResult = "10 + 10 + 5 + 2 + 2 + 2";
        $result = rendu($totalAmount, $denominations);

        $this->assertEquals($expectedResult, $result);
    }
}
