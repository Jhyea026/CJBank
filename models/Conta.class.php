<?php
class Conta
{
    private $id;
    private $agencia;
    private $numeroConta;
    private $extratoConta;
    private $saldo;
    private $existeEmprestimo;


    function __construct($agencia, $numeroConta, $extratoConta, $saldo, $existeEmprestimo = false)
    {
        $this->agencia = $agencia;
        $this->numeroConta = $numeroConta;
        $this->extratoConta = $extratoConta;
        $this->saldo = $saldo;
        $this->existeEmprestimo = $existeEmprestimo;
    }

    function getAgencia()
    {
        return $this->agencia;
    }
    function getnumeroConta()
    {
        return $this->numeroConta;
    }
    function getextratoConta()
    {
        return $this->extratoConta;
    }
    function getSaldo()
    {
        return $this->saldo;
    }
    function existeEmprestimo()
    {
        return $this->existeEmprestimo;
    }

    function setAgencia($agencia)
    {
        $this->agencia = $agencia;
    }

    function setNumeroConta($numeroConta)
    {
        $this->numeroConta = $numeroConta;
    }

    function setExtratoConta($extratoConta)
    {
        $this->extratoConta = $extratoConta;
    }

    function setSaldo($saldo)
    {
        $this->saldo = $saldo;
    }

    function setExisteEmprestimo($existeEmprestimo)
    {
        $this->existeEmprestimo = $existeEmprestimo;
    }

}
?>