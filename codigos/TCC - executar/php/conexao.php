<?php
function conectar()
{

    $host = 'localhost';
    $db = 'livraria';
    $user = 'root';
    $password = '';

    $pdo = new PDO("mysql:host=$host; dbname=$db;charset=utf8", $user, $password);
    return $pdo;
} 

function brmy($data)
{
    $dataa = implode("/", array_reverse(explode("-", $data)));
    return $dataa;
}

function mybr($data)
{
    $datam = implode("-", array_reverse(explode("/", $data)));
    return $datam;
}

function formatar($valor) {
    return number_format($valor / 1, 2, '.', '');
}