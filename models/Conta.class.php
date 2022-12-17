<?php
class Conta
{
    public $id;
    public $agencia;
    public $numeroConta;
    public $saldo;
    public $possuiEmprestimo;

    function __construct($agencia, $numeroConta, $saldo, $possuiEmprestimo = false)
    {
        $this->agencia = $agencia;
        $this->numeroConta = $numeroConta;
        $this->saldo = $saldo;
        $this->possuiEmprestimo = $possuiEmprestimo;
    }

    public static function get($con, $id)
    {
        $sql = "SELECT * FROM Conta WHERE idConta='$id'";
        $result = $con->query($sql);
        $row = $result->fetch();
        return new Conta($row['agencia'], $row['numeroConta'], $row['saldo'], $row['possuiEmprestimo']);
    }

    public static function getAll($con){
        $sql = "SELECT * FROM Conta";
        $result = $con->query($sql);
        foreach ($result as $row)
        {
            $contas[] = new Conta($row['agencia'], $row['numeroConta'], $row['saldo'], $row['existeEmprestimo']);
        }
        return $contas;
    }

    public static function create($con, $idUsuario, $agencia, $numeroConta, $saldo, $possuiEmprestimo=false){
        $sql = "INSERT INTO Conta (idUsuario, agencia, numeroConta, saldo, existeEmprestimo) VALUES (,($idUsuario,'$agencia', '$numeroConta', '$saldo', '$possuiEmprestimo')";
        $con->query($sql);
        return $con->getLastId();
    }

    public static function update($con, $id, $agencia, $numeroConta, $saldo, $possuiEmprestimo)
    {
        $sql = "UPDATE Conta SET agencia='$agencia', numeroConta='$numeroConta', saldo='$saldo', possuiEmprestimo='$possuiEmprestimo' WHERE idConta='$id'";
        $con->query($sql);
    }

    public static function delete($con, $id)
    {
        $sql = "DELETE FROM Conta WHERE idConta='$id'";
        $con->query($sql);
    }
}
?>