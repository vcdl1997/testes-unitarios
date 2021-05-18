<?php

class CompraDAO{

    public function load(array $params = []) :array
    {
        return [
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
        ];
    }
     
    public function insert() :bool
    {
        return true;
    }
     
    public function update() :bool
    {
        return true;
    }
     
    public function delete() :bool
    {
        return true;
    }
}