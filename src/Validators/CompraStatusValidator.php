<?php

class CompraStatusValidator {

    private $compraDAO;

    public function __construct(CompraDAO $compraDAO)
    {
        $this->compraDAO = $compraDAO;
    }

    public function existemComprasCanceladas() :bool
    {
        $compras = $this->compraDAO->load();

        foreach($compras as $compra){
            if(!$compra->getStatus()) return true;
        }

        return false;
    }
}