<?php

require_once 'autoload.php';

/**
 * @author Vinicius Costa
 * @package Test/Validators
 * @access public
 * @exemple ./vendor/bin/phpunit src/Test/Validators/ProdutosCompraValidatorTest.php
 */ 
class ProdutosCompraValidatorTest extends \PHPUnit\Framework\TestCase{

    /**
     * @dataProvider valueProvider 
     */
    public function testProdutosCompraEhValido($value, $expectedResult)
    {
        $produtosCompraValidator = new ProdutosCompraValidator($value);
        $ehUmaInstanciaDeProduto = $produtosCompraValidator->ehUmaInstanciaDeProduto();
        $this->assertEquals($expectedResult, $ehUmaInstanciaDeProduto);
    }


    public function valueProvider()
    {
        return [
            "testNaoEhUmaInstanciaDeProduto" => [
                "value" => [
                    new Cliente("Alfredo", "428.548.580-00"),
                    new Cliente("Antonio", "895.783.660-86")
                ],
                "expectedResult" => false
            ],
            "testEhUmaInstanciaDeProduto" => [
                "value" => [
                    new Produto("Shampoo Palmolive", 1.75, 4.8, 100),
                    new Produto("Sabonete Francis", 0.55, 1.5, 1000)
                ],
                "expectedResult" => true
            ]
        ];
    }
}