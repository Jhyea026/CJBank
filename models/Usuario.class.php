<?php
class Usuario
{
    private $nome;
    private $cpf;
    private $dataNascimento;
    private $senha;

    public function __construct($nome, $cpf, $dataNascimento, $senha)
    {
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->dataNascimento = $dataNascimento;
        $this->senha = $senha;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getCpf()
    {
        return $this->cpf;
    }

    public function getDataNascimento()
    {
        return $this->dataNascimento;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }

    public function setDataNascimento($dataNascimento)
    {
        $this->dataNascimento = $dataNascimento;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

}
        
?>