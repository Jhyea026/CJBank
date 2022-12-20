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

    public static function create($con, $idUsuario, $agencia, $numeroConta, $saldo, $possuiEmprestimo = 0){
        echo "Conta $agencia, $numeroConta, $saldo, $possuiEmprestimo)";
        $sql = "INSERT INTO Conta (idUsuarioRef, agencia, numeroConta, saldo, possuiEmprestimo) VALUES ($idUsuario,'$agencia', '$numeroConta', '$saldo', '$possuiEmprestimo')";
        $con->query($sql);

        return $con->lastInsertId();
    }

    public static function update($con, $id, $agencia, $numeroConta, $saldo, $possuiEmprestimo)
    {
        $sql = "UPDATE Conta SET agencia='$agencia', numeroConta='$numeroConta', saldo='$saldo', possuiEmprestimo=  $possuiEmprestimo WHERE idConta='$id'";
        $con->query($sql);
    }

    public static function delete($con, $id)
    {
        $sql = "DELETE FROM Conta WHERE idConta='$id'";
        $con->query($sql);
    }

    public static function buscarContaPorUsuario($con, $idUsuario){
        $sql = "SELECT * FROM Conta WHERE idUsuarioRef='$idUsuario'";
        $result = $con->query($sql);
        $row = $result->fetch();

        return $row['idConta'];
    }

    public static function adicionarSaldo($con, $idConta, $valorAdicionar)
    {
        $conta = Conta::get($con, $idConta);
        $novo_valor = $conta->saldo + $valorAdicionar;
        Conta::update($con, $idConta, $conta->agencia, $conta->numeroConta, $novo_valor, $conta->possuiEmprestimo);
    }

    public static function buscarContaPorAgenciaeNumero($con, $agencia, $numeroConta){
        $sql = "SELECT * FROM Conta WHERE agencia='$agencia' AND numeroConta='$numeroConta'";
        $result = $con->query($sql);
        $row = $result->fetch();
        return $row['idConta'];
    }

    public static function realizarTransferencia($con, $idRemetente, $idDestinatario, $valor){
        $contaRemetente = Conta::get($con, $idRemetente);
        $contaDestinatario = Conta::get($con, $idDestinatario);

        $saldoRemetente = $contaRemetente->saldo - $valor;
        $saldoDestinatario = $contaDestinatario->saldo + $valor;

        Conta::update($con, $idRemetente, $contaRemetente->agencia, $contaRemetente->numeroConta, $saldoRemetente, $contaRemetente->possuiEmprestimo);
        Conta::update($con, $idDestinatario, $contaDestinatario->agencia, $contaDestinatario->numeroConta, $saldoDestinatario, $contaDestinatario->possuiEmprestimo);
    }
}
?>