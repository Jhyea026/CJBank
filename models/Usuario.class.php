<?php
class Usuario
{
    public $nome;
    public $cpf;
    public $dataNascimento;
    public $senha;

    public function __construct($nome, $cpf, $dataNascimento, $senha)
    {
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->dataNascimento = $dataNascimento;
        $this->senha = $senha;
    }

    public static function get($con, $id){
        $sql = "SELECT * FROM Usuario WHERE idUsuario='$id'";
        $result = $con->query($sql);
        $row = $result->fetch();
        return new Usuario($row['nome'], $row['cpf'], $row['dataNascimento'], $row['senha']);
    }

    public static function getAll($con){
        $sql = "SELECT * FROM Usuario";
        $result = $con->query($sql);

        foreach ($result as $row) {
            $usuarios[] = new Usuario($row['nome'], $row['cpf'], $row['dataNascimento'], $row['senha']);
        }
        return $usuarios;
    }

    public static function create($con, $nome, $cpf, $dataNascimento, $senha)
    {
        echo "create\n {$nome}, {$cpf}, {$dataNascimento}, {$senha}\n";
        $sql = "INSERT INTO Usuario (nome, cpf, dataNascimento, senha) VALUES ('$nome', '$cpf', '$dataNascimento', '$senha')";
        $con->query($sql);

    }

    public static function update($con, $id, $nome, $cpf, $dataNascimento, $senha){
        $sql = "UPDATE Usuario SET nome='$nome', cpf='$cpf', dataNascimento='$dataNascimento', senha='$senha' WHERE idUsuario='$id'";
        $con->query($sql);
    }

    public static function delete($con, $id)
    {
        $sql = "DELETE FROM Usuario WHERE idUsuario='$id'";
        $con->query($sql);
    }
}
        
?>