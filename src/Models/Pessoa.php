<?php

abstract class Pessoa{

    private String $documento;
    private String $nome;

    public function __construct(String $documento, String $nome)
    {
        $this->documento = $documento;
        $this->nome = $nome;
    }

    public function getDocumento() :String
    {
        return $this->documento;
    }

    public function getNome() :String
    {
        return $this->nome;
    }   
}