<?php
    require 'config.php';

    $id = filter_input(INPUT_POST, 'id');
    $nome = filter_input(INPUT_POST, 'nome_contato');
    $idade = filter_input(INPUT_POST, 'idade_contato');
    $telefone = filter_input(INPUT_POST, 'telefone_contato');

    if($id &&  $nome &&  $idade &&  $telefone){
       $sql = $conn->prepare("UPDATE contato SET nome_contato =:nome_contato, idade_contato = :idade_contato, telefone_contato = :telefone_contato WHERE id = :id");
        $sql->bindValue(':nome_contato', $nome);
        $sql->bindValue(':idade_contato', $idade);
        $sql->bindValue(':telefone_contato', $telefone);
        $sql->bindValue(':id', $id);
        $sql->execute();

        header("Location: index.php");
        exit;
    }else{
        header("Location: index.php");
        exit;
    }
