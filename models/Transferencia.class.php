
<?php

class Transferencia {
    public $id;
    public $tipo;
    public $data;
    public $valor;
    public $remetente;

    public function __construct($tipo, $data, $valor, $remetente)
    {
        $this->tipo = $tipo;
        $this->data = $data;
        $this->valor = $valor;
        $this->remetente = $remetente;
    }
}

?>