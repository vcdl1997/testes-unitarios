<?php

class ProdutosCompraValidator{
    private array $produtos;
    
    public function __construct(array $produtos)
    {
        $this->produtos = $produtos;
    }

    public function ehUmaInstanciaDeProduto() :bool
    {
        foreach($this->produtos as $produto){
            if(!$produto instanceof Produto) return false;
        }

        return true;
    }
}