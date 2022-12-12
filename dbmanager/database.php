<?php

interface Database
{
    public static function inserir($con, $object);
    public static function remover($con, $param);
    public static function listar($con);
    public static function editar($con, $id, $object);
}

?>
