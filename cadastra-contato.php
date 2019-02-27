<?php

ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);
$conn = new PDO('mysql:host=127.0.0.1;dbname=encant69_database', 'root','caue');

$dadosInsert = [
    'nome' => $_GET['nome'],
    'email' => $_GET['email'],
    'mensagem' => $_GET['mensagem'],
    'datahora' => date('Y-m-d H:i:s'),
    'comosoube' => $_GET['comosoube']
];

$sqlInsert = "INSERT 
        INTO contato
             (nome,
              email,
              mensagem,
              datahora,
              comosoube)
          VALUES (:nome,
              :email,
              :mensagem,
              :datahora,
              :comosoube)";
$conn->prepare($sqlInsert)
     ->execute($dadosInsert);
$id = $conn->lastInsertId();

if ($id)
{
    echo json_encode(["mensagem"=>'Comentário inserido com sucesso. Entraremos em contato com você em breve.']);
}
else 
{
    echo json_encode(["mensagem"=>'Houve um problema ao inserir seu comentário, tente novamente mais tarde.']);
}
unset($conn);