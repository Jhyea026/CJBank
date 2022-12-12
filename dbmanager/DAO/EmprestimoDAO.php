

<?php

class EmprestimoDAO implements Database {
    
    public static function inserir($con, $idConta, $idUsuario, $object)
{
    $sql = "INSERT INTO Emprestimo (idConta, idUsuario,valor,numeroParcelas,valorParcelas) VALUES ($idConta, $idUsuario, '$object->valor', '$object->numParcela', $object->valorParceclas)";

    $con->query($sql);
    $object->id = $con->lastInsertId();
}

public static function remover($con, $id){
    $sql = "DELETE FROM Emprestimo WHERE id=$id";
    $con->query($sql);
}

public static function listar($con){
    $sql = "SELECT * FROM Emprestimo";
    $result = $con->query($sql);
    foreach ($result as $row)
    {
        $emprestimos[] = new Emprestimo($row['valor'], $row['numeroParcelas'], $row['valorParcelas']);
    }
    return $emprestimos;
}

public static function editar($con, $id, $object){
    $sql = "UPDATE Emprestimo SET valor = $object->valor, numeroParcelas = $object->numParcela, valorParcelas = $object->valorParcelas WHERE id = $id";

    $con->query($sql);
}
}

?>