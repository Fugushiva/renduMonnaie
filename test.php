<?php

use PHPUnit\Framework\TestCase;

require 'rendu.php'; // Assurez-vous de spécifier le chemin correct

class FunctionsTest extends TestCase
{
    // Teste si la fonction rendu() génère le bon rendu avec les dénominations par défaut.
    public function testRenduAvecDenominationsParDefaut()
    {
        $totalAmount = 17;
        $expectedResult = "10 + 5 + 2";
        $result = rendu($totalAmount); 

        $this->assertEquals($expectedResult, $result);
    }

    // Teste si la fonction rendu() génère une exception avec un montant impossible.
    public function testExceptionPourMontantImpossible()
    {
        $this->expectException(\Exception::class);

        $totalAmount = 7;
        $denominations = [2, 5, 10];

        rendu($totalAmount); 
    }

    // Teste si la fonction rendu() génère le bon message d'exception pour un montant impossible avec des dénominations personnalisées.
    public function testRenduAvecDenominationsPersonnalisees()
    {
        $this->expectException(\Exception::class);
        $totalAmount = 27;
        $denominations = [5, 10, 25];
        $expectedResult = "27 n'est pas possible avec les billets disponibles 5,10,25";
        $result = rendu($totalAmount, $denominations); //impossible à cause tu tableau de valeurs

        $this->assertEquals($expectedResult, $result);
    }

    // Teste si la fonction rendu() génère le bon rendu pour un montant donné avec des dénominations spécifiques.
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
        $expectedResult = "5 + 5 + 1"; //erreur
        $result = rendu($totalAmount, $denominations);

        $this->assertEquals($expectedResult, $result);
    }

    // Teste si la fonction rendu() génère le bon rendu pour un montant donné avec les dénominations par défaut.
    public function testRenduPourMontant21()
    {
        $totalAmount = 21;
        $expectedResult = "10 + 10 + 1"; //erreur
        $result = rendu($totalAmount); 

        $this->assertEquals($expectedResult, $result);
    }

    // Teste si la fonction rendu() génère le bon rendu pour un montant donné avec les dénominations par défaut.
    public function testRenduPourMontant23()
    {
        $totalAmount = 23;
        $expectedResult = "10 + 10 + 2 + 1"; //erreur
        $result = rendu($totalAmount); 

        $this->assertEquals($expectedResult, $result);
    }

    // Teste si la fonction rendu() génère le bon rendu pour un montant donné avec des dénominations spécifiques.
    public function testRenduPourMontant31()
    {
        $totalAmount = 31;
        $denominations = [2, 5, 10];
        $expectedResult = "10 + 10 + 5 + 2 + 2 + 2";
        $result = rendu($totalAmount, $denominations);

        $this->assertEquals($expectedResult, $result);
    }
}
