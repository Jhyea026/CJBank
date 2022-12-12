<?php
require_once './dbmanage/database.php';
class UsuarioDAO implements Database
{
    public static function inserir($con, $object)
    {
        $sql = "INSERT INTO Usuario (cpf,nome,dataNascimento,senha) VALUES ('$object->cpf', '$object->nome', '$object->dataNascimento', '$object->senha')";

        $con->query($sql);
        $object->id = $con->lastInsertId();
    }

    public static function remover($con, $id){
        $sql = "DELETE FROM Usuario WHERE id=$id";
        $con->query($sql);
    }

    public static function listar($con){
        $sql = "SELECT * FROM Usuario";
        $result = $con->query($sql);
        foreach ($result as $row)
        {
            $usuarios[] = new Usuario($row['nome'], $row['cpf'], $row['dataNascimento'], $row['senha']);
        }
        return $usuarios;
    }

    public static function editar($con, $id, $object){
        $sql = "UPDATE Usuario SET nome = $object->nome, cpf = $object->cpf, dataNascimento = $object->dataNascimento,
        senha = $object->senha WHERE id = $id";

        $con->query($sql);
    }
}
?>