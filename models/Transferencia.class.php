
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
        $sql = "SELECT * FROM transferencia WHERE  idTransferencia = '$id'";
        $result = $con->query($sql);
        $row = $result->fetch();
        return new Transferencia($row['data'], $row['valor'], $row['remetente'], $row['destinatario']);
    }

    public function getAll($con){
        $sql = "SELECT * FROM transferencia";
        $result = $con->query($sql);
        foreach ($result as $row) {
            $transferencias[]= new Transferencia($row['data'], $row['valor'], $row['remetente'], $row['destinatario']);
        }
        return $transferencias;
    }
    public static function create($con, $idConta, $data, $valor, $remetente, $destinatario)
    {
        $sql = "INSERT INTO Transferencia (idConta, data, valor, remetente, destinatario) VALUES ($idConta, '$data', $valor, $remetente, $destinatario)";
        $con->query($sql);

        return $con->lastInsertId();

    }

    public static function update($con, $id, $data, $valor, $remetente, $destinatario){
        $sql = "UPDATE Transferencia SET data = $data, valor = $valor, remetente = $remetente, destinatario = $destinatario WHERE idTransferencia = $id";
        $con->query($sql);
    }
    public static function delete($con, $id)
    {
        $sql = "DELETE FROM Transferencia WHERE idTransferencia = $id";
        $con->query($sql);
    }
}

?>