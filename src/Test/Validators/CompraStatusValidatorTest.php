<?php

require_once 'autoload.php';

/**
 * @author Vinicius Costa
 * @package Test/Validators
 * @access public
 * @exemple ./vendor/bin/phpunit src/Test/Validators/CompraStatusValidatorTest.php
 */ 
class CompraStatusValidatorTest extends PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider valueProvider
     */
    public function testExisteComprasCanceladas($value, $expectedValue)
    {
        $comprasDaoMock = $this->createMock(CompraDAO::class);

        $comprasDaoMock->method('load')->willReturn($value);

        $compraStatusValidator = new CompraStatusValidator($comprasDaoMock);

        $existemComprasCanceladas = $compraStatusValidator->existemComprasCanceladas();

        $this->assertEquals($expectedValue, $existemComprasCanceladas);
    }

    
    public function valueProvider()
    {
        return [
            "apenasUmaCompraCancelada" => [
                "value" => [
                    new Compra(
                        new Cliente("Heitor", "733.794.030-08"), 
                        [
                            new Produto("Tomate 1Kg", 1.75, 5.0, 2000),
                            new Produto("Brócolis 1Kg", 2.00, 6.5, 500)
                        ],
                        false
                    ),
                    new Compra(
                        new Cliente("Alexandre", "985.984.290-66"), 
                        [
                            new Produto("Vinho", 5.50, 20.4, 100),
                            new Produto("Pão", 0.05, 0.30, 1000)
                        ]
                    )
                ],
                "expectedValue" => true
            ],
            "nenhumaCompraCancelada" => [
                "value" => [
                    new Compra(
                        new Cliente("Heitor", "733.794.030-08"), 
                        [
                            new Produto("Tomate 1Kg", 1.75, 5.0, 2000),
                            new Produto("Brócolis 1Kg", 2.00, 6.5, 500)
                        ]
                    ),
                    new Compra(
                        new Cliente("Alexandre", "985.984.290-66"), 
                        [
                            new Produto("Vinho", 5.50, 20.4, 100),
                            new Produto("Pão", 0.05, 0.30, 1000)
                        ]
                    )
                ],
                "expectedValue" => false
            ]
        ];
    }

}