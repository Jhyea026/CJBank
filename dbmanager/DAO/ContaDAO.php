<?php

    class ContaDAO implements Database {
        
        public static function inserir($con, $idUsuario, $object)
    {
        $sql = "INSERT INTO Conta (idUsuario, agencia,numeroConta,saldo,possuiEmprestimo) VALUES ($idUsuario, '$object->agencia', '$object->dataNascimento', $object->saldo, $object->possuiEmprestimo)";

        $con->query($sql);
        $object->id = $con->lastInsertId();
    }

    public static function remover($con, $id){
        $sql = "DELETE FROM Conta WHERE id=$id";
        $con->query($sql);
    }

    public static function listar($con){
        $sql = "SELECT * FROM Conta";
        $result = $con->query($sql);
        foreach ($result as $row)
        {
            $contas[] = new Conta($row['agencia'], $row['numeroConta'], $row['saldo'], $row['possuiEmprestimo']);
        }
        return $contas;
    }

    public static function editar($con, $id, $object){
        $sql = "UPDATE Conta SET agencia = $object->agencia, numeroConta = $object->numeroConta, saldo = $object->saldo,
        possuiEmprestimo = $object->possuiEmprestimo WHERE id = $id";

        $con->query($sql);
    }
    }

?>