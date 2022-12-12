<?php

class TransferenciaDAO implements Database
{

    public static function inserir($con, $idConta, $idUsuario, $object)
    {
        if ($object->tipo == 1) {
            $sql = "INSERT INTO Transferencia (idConta, idUsuario, tipo,data, valor, remetente) VALUES ($idConta, $idUsuario, $object->tipo, $object->data, $object->valor, $object->remetente)";
            $con->query($sql);
            $object->id = $con->lastInsertId();

        } else if ($object->tipo == 2) {
            $sql = "INSERT INTO Transferencia (idConta, idUsuario, tipo, data, valor, remetente) VALUES ($idConta, $idUsuario, $object->tipo,$object->data ,$object->valor, null)";
            $con->query($sql);
            $object->id = $con->lastInsertId();
        }
    }

    public static function remover($con, $id)
    {
        $sql = "DELETE FROM Transferencia WHERE id = $id";
        $con->query($sql);
    }

    public static function listar($con)
    {
        $sql = "SELECT * FROM Transferencia";
        $result = $con->query($sql);
        foreach ($result as $row) {
            $transferencias[] = new Transferencia($row['tipo'], $row['data'], $row['valor'], $row['remetente']);
        }
        return $transferencias;
    }

    public static function editar($con, $id, $object){
        $sql = "UPDATE Transferencia SET tipo = $object->tipo, data = $object->data, valor = $object->valor,
        remetente = $object->remetente WHERE id = $id";

        $con->query($sql);
    }
    
}


?>