<?php

    require "config.php";

    $nome = filter_input(INPUT_POST, 'nome_contato');
    $idade = filter_input(INPUT_POST, 'idade_contato');
    $telefone = filter_input(INPUT_POST, 'telefone_contato');

    if ($nome && $idade &&  $telefone) {

    $sql = $conn->prepare("INSERT INTO contato (nome_contato, idade_contato, telefone_contato) VALUES (:nome_contato, :idade_contato, :telefone_contato)");
    $sql->bindValue(':nome_contato', $nome);
    $sql->bindValue(':idade_contato', $idade);
    $sql->bindValue(':telefone_contato', $telefone);
    $sql->execute();

    header("Location: index.php");
    exit;
}else{
      header("Location: index.php");
    exit;
}