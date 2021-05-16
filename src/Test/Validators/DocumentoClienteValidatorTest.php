<?php

require_once 'autoload.php';

/**
 * @author Vinicius Costa
 * @package Test/Validators
 * @access public
 * @exemple ./vendor/bin/phpunit src/Test/Validators/DocumentoClienteValidatorTest.php
 */ 
class DocumentoClienteValidatorTest extends \PHPUnit\Framework\TestCase{

    /**
     * @dataProvider valueProvider 
     */
    public function testDocumentoClienteEhValido($value, $expectedResult)
    {
        $documentoClienteValidator = new DocumentoClienteValidator($value);
        $documentoEhValido = $documentoClienteValidator->documentoEhValido();
        $this->assertEquals($expectedResult, $documentoEhValido);
    }


    public function valueProvider()
    {
        return [
            "testDocumentoClienteInvalido1" => [
                "value" => "111.111.111-11",
                "expectedResult" => false
            ],
            "testDocumentoClienteInvalido2" => [
                "value" => "",
                "expectedResult" => false
            ],
            "testDocumentoClienteInvalido3" => [
                "value" => "11111111111",
                "expectedResult" => false
            ],
            "testDocumentoClienteInvalido4" => [
                "value" => "111.111.111-1a",
                "expectedResult" => false
            ],
            "testDocumentoClienteValido1" => [
                "value" => "850.534.910-54",
                "expectedResult" => true
            ],
            "testCnpjInvalido1" => [
                "value" => "11.111.111/1111-11",
                "expectedResult" => false
            ],
            "testCnpjInvalido2" => [
                "value" => "",
                "expectedResult" => false
            ],
            "testCnpjInvalido3" => [
                "value" => "111111111111111111",
                "expectedResult" => false
            ],
            "testCnpjInvalido4" => [
                "value" => "111ab1111111111",
                "expectedResult" => false
            ],
            "testCnpjValido1" => [
                "value" => "05.072.394/0001-07",
                "expectedResult" => true
            ]
        ];
    }
}