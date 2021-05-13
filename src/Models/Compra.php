<?php

class Compra{

    static int $sequencia = 0;
    private int $numero;
    private Cliente $cliente;
    private array $produtos;

    public function __construct(
        Cliente $cliente, 
        array $produtos
    )
    {
        self::$sequencia++;
        $this->numero = self::$sequencia;
        $this->cliente = $cliente; 
        $this->produtos = $produtos; 
    }

}