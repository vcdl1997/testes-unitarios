<?php

class Produto{

    private String $nomeProduto;
    private float $valorEntrada;
    private float $valorSaida;
    private int $quantidade;
    private bool $disponibilidade;


    public function __construct(
        String $nomeProduto, 
        float $valorEntrada, 
        float $valorSaida, 
        int $quantidade
    )
    {
        $this->nomeProduto = $nomeProduto; 
        $this->valorEntrada = $valorEntrada;  
        $this->valorSaida = $valorSaida;
        $this->quantidade = $quantidade;
        $this->disponibilidade = true;   
    }


    public function adicionarQuantidades(int $quantidade) :void
    {
        if($quantidade > 0) $this->quantidade += $quantidade;
    }


    public function removerQuantidades(int $quantidade) :void
    {
        if($this->quantidade > 0 && $quantidade > 0) $this->quantidade -= $quantidade;
    }


    public function desativarProduto() :void
    {
        $this->disponibilidade = false;
    }
}