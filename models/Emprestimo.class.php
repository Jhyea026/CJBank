<?php
class Emprestimo
{
    public $id;
    public $valor;
    public $numeroParcelas;
    public $valorParcelas;

    public function __construct($valor, $parcelas, $valorParcelas)
    {
        $this->valor = $valor;
        $this->numeroParcelas = $parcelas;
        $this->valorParcelas = $valorParcelas;
    }

    
    public static function get($con, $id){
        $sql = "SELECT * FROM Emprestimos WHERE idEmprestimo='$id'";
        $result = $con->query($sql);
        $row = $result->fetch();
        return new Emprestimo($row['valor'], $row['numeroParcelas'], $row['valorParcelas']);
    }
    
    public static function getAll($con)
    {
        $sql = "SELECT * FROM Emprestimos";
        $result = $con->query($sql);
        foreach ($result as $row) {
            $emprestimos[] = new Emprestimo($row['valor'], $row['numeroParcelas'], $row['valorParcelas']);
        }
        return $emprestimos;
    }
    public static function create($con,$id, $valor, $parcelas, $valorParcelas){
        $sql = "INSERT INTO Emprestimos (id,valor,numeroParcelas,valorParcelas) VALUES ('$id','$valor','$parcelas','$valor";
        $con->query($sql);
    }

    public static function update($con, $id, $valor, $parcelas, $valorParcelas){
        $sql = "UPDATE Emprestimos SET valor='$valor', numeroParcelas='$parcelas', valorParcelas='$valorParcelas' WHERE idEmprestimo='$id'";
        $con->query($sql);
    }

    public static function delete($con, $id)
    {
        $sql = "DELETE FROM Emprestimos WHERE idEmprestimo='$id'";
        $con->query($sql);
    }
}

?>