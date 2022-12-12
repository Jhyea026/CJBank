<?php
class Emprestimo
{
    public $id;
    public $valor;
    public $numParcela;
    public $valorParcela;

    public function __construct($valor, $parcela, $valorParcela)
    {
        $this->valor = $valor;
        $this->numParcela = $parcela;
        $this->valorParcela = $valorParcela;
    }

    public function getValor()
    {
        return $this->valor;
    }
    public function getParcela()
    {
        return $this->numParcela;
    }
    public function getValorParcela()
    {
        return $this->valorParcela;
    }

    public function setValor($valor)
    {
        $this->valor = $valor;
    }

    public function setParcela($parcela)
    {
        $this->numParcela = $parcela;
    }

    public function setValorParcela($valorParcela)
    {
        $this->valorParcela = $valorParcela;
    }
}

?>