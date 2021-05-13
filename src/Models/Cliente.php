<?php

class Cliente extends Pessoa{

    private String $dataCadastro;
    private int $numeroDeCompras;
    private bool $status;

    public function __construct(String $nome, String $cpf){
        parent::__construct($nome, $cpf);
        $this->dataCadastro = date('d-m-Y H:i:s');
        $this->numeroDeCompras = 0;
        $this->status = true;
    }

    public function desativarCadastro() :void
    {
        $this->status = false;
    }

    public function reativarCadastro() :void
    {
        $this->status = true;
    }
}