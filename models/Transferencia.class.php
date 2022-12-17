
<?php

class Transferencia {
    private $id;
    private $idConta;
    private $data;
    private $valor;
    private $remetente;
    private $destinatario;

    public function __construct($data, $valor, $remetente, $destinatario)
    {
        $this->data = $data;
        $this->valor = $valor;
        $this->remetente = $remetente;
        $this->destinatario = $destinatario;
    }

    public static function get($con, $id){
        $sql = "SELECT * FROM transferencias WHERE  idTransferencia = '$id'";
        $result = $con->query($sql);
        $row = $result->fetch();
        return new Transferencia($row->data, $row->valor, $row->remetente, $row->destinatario);
    }

    public function getAll($con){
        $sql = "SELECT * FROM transferencias";
        $result = $con->query($sql);
        foreach ($result as $row) {
            $transferencias[]= new Transferencia($row->data, $row->valor, $row->remetente, $row->destinatario);
        }
        return $transferencias;
    }
    public static function create($con, $data, $valor, $remetente, $destinatario)
    {
        $sql = "INSERT INTO Transferencias (data, valor, remetente, destinatario) VALUES ($data, $valor, $remetente, $destinatario)";
        $con->query($sql);

    }

    public static function update($con, $id, $data, $valor, $remetente, $destinatario){
        $sql = "UPDATE Transferencias SET data = $data, valor = $valor, remetente = $remetente, destinatario = $destinatario WHERE idTransferencia = $id";
        $con->query($sql);
    }
    public static function delete($con, $id)
    {
        $sql = "DELETE FROM Transferencias WHERE idTransferencia = $id";
        $con->query($sql);
    }
}

?>