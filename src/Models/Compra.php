<?php

class Compra{

    static int $sequencia = 0;
    private int $numero;
    private Cliente $cliente;
    private array $produtos;
    private bool $status;

    public function __construct(
        Cliente $cliente, 
        array $produtos,
        bool $status = true
    )
    {
        self::$sequencia++;
        $this->numero = self::$sequencia;
        $this->cliente = $cliente; 
        $this->produtos = $produtos; 
        $this->status = $status; 
    }

    public function getNumero() :int
    {
        return $this->numero;
    }

    public function getCliente() :String
    {
        return $this->cliente->getNome();
    }

    public function getProdutos() :array
    {
        return $this->produtos;
    }

    public function getStatus() :bool
    {
        return $this->status;
    }

}