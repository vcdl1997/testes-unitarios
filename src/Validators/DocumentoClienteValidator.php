<?php

class DocumentoClienteValidator{
    private String $documento;

    public function __construct(String $documento)
    {
        $this->documento = trim($documento);
    }


    /**
     * Função validar se o documento do cliente é valido ou não
     * @access public
     * @return bool
     */ 
    public function documentoEhValido() :bool
    {
        $docLenght = strlen($this->documento);

        if($docLenght < 14 || $docLenght > 18) return false;

        switch($docLenght){
            case 14: 
                return $this->validarCPF($this->documento);

            case 18:
                return $this->validarCnpj($this->documento);

            default: 
                return false;
        }
    }


    /**
     * Função para calcular se os digitos do cpf do cliente é valido ou não
     * @access public
     * @param String $cpf
     * @return bool
     */ 
    public function validarCPF(String $cpf) :bool
    {
        //verifica quantos caracteres diferentes a string possui
        if(strlen(count_chars($cpf, 3)) == 3) return false;
        
        $numerosCpf = str_split(preg_replace("/[^0-9]/","", $cpf));

        if(count($numerosCpf) < 11 || count($numerosCpf) > 11) return false;
        
        foreach($numerosCpf as $numero){
            if(!is_numeric($numero)) return false;
        }

        $numerosCpf = array_map('intval', $numerosCpf);

        // Validação primeiro digito verificador
        $base = $numerosCpf;
        $base = array_splice($base, 0, 9);
        $somaBase = 0;
        $decrement = 10;

        foreach($base as $numero){
            $somaBase += ($numero * $decrement);
            $decrement--;
        }

        $divisaoSomaBase = intval($somaBase/11);
        $resto = $somaBase - ( 11 * $divisaoSomaBase);

        switch($resto){
            case 0: case 1:
                $primeiroDigitoVerificador = $numerosCpf[9];
                if(!in_array($primeiroDigitoVerificador, [0,1])) return false;
            break;

            default:
                $primeiroDigitoVerificador = 11 - $resto;
                if($primeiroDigitoVerificador != $numerosCpf[9]) return false;
            break;
        }

        // Validação segundo digito verificador
        $base = $numerosCpf;
        $base = array_splice($base, 0, 10);
        $decrement = 11;
        $somaBase = 0;

        foreach($base as $numero){
            $somaBase += ($numero * $decrement);
            $decrement--;
        }

        $divisaoSomaBase = intval($somaBase/11);
        $resto = $somaBase - ( 11 * $divisaoSomaBase);

        switch($resto){
            case 0: case 1:
                $segundoDigitoVerificador = $numerosCpf[10];
                if(!in_array($segundoDigitoVerificador, [0,1])) return false;
            break;

            default:
                $segundoDigitoVerificador = 11 - $resto;
                if($segundoDigitoVerificador != $numerosCpf[10]) return false;
            break;
        }

        return true;
    }


    /**
     * Função para calcular se os digitos do cnpj do cliente é valido ou não
     * @access public
     * @param String $cnpj
     * @return bool
     */ 
    public function validarCnpj(String $cnpj) :bool
    {
        //verifica quantos caracteres diferentes a string possui
        if(strlen(count_chars($cnpj, 3)) == 4) return false;

        $numerosCnpj = str_split(preg_replace("/[^0-9]/","", $cnpj));

        if(count($numerosCnpj) < 14 || count($numerosCnpj) > 14) return false;

        foreach($numerosCnpj as $numero){
            if(!is_numeric($numero)) return false;
        }

        $numerosCnpj = array_map('intval', $numerosCnpj);

        // Validação primeiro digito verificador
        $base = $numerosCnpj;
        $base = array_splice($base, 0, 12);
        $somaBase = 0;
        $decrement = 5;

        foreach($base as $numero){
            $somaBase += ($numero * $decrement);
            $decrement--;
            if($decrement < 2) $decrement = 9;
        }

        $resto = $somaBase % 11;

        switch($resto){
            case 0: case 1:
                $primeiroDigitoVerificador = $numerosCnpj[12];
                if(!in_array($primeiroDigitoVerificador, [0,1])) return false;
            break;

            default:
                $primeiroDigitoVerificador = 11 - $resto;
                if($primeiroDigitoVerificador != $numerosCnpj[12]) return false;
            break;
        }


        // Validação segundo digito verificador
        $base = $numerosCnpj;
        $base = array_splice($base, 0, 13);
        $somaBase = 0;
        $decrement = 6;
        

        foreach($base as $numero){
            $somaBase += ($numero * $decrement);
            $decrement--;
            if($decrement < 2) $decrement = 9;
        }

        $resto = $somaBase % 11;

        switch($resto){
            case 0: case 1:
                $segundoDigitoVerificador = $numerosCnpj[13];
                if(!in_array($segundoDigitoVerificador, [0,1])) return false;
            break;

            default:
                $segundoDigitoVerificador = 11 - $resto;
                if($segundoDigitoVerificador != $numerosCnpj[13]) return false;
            break;
        }

        return true;
    }
}