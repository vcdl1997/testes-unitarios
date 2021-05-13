<?php

require_once 'autoload.php';

// $vinicius = new Cliente("111.111.111-11", "Vinicius Costa");

// echo '<pre>';
// print_r($vinicius->getDocumento());
// echo '<br>';
// print_r($vinicius->getNome());
// echo '<br>';

// $produtos = [
//     new Produto("Shampoo Palmolive", 1.75, 4.8, 100),
//     new Produto("Sabonete Francis", 0.55, 1.5, 1000)
// ];

// $compra = new Compra($vinicius, $produtos);

// $validacao = new ProdutosCompraValidator($produtos);

// var_dump(strlen(count_chars("111.111.111-11", 3)));
var_dump(strlen(count_chars("11.111.111/1111-11", 3)));

$documentoClienteValidator = new DocumentoClienteValidator("111.111.111-11");

var_dump($documentoClienteValidator->documentoEhValido());