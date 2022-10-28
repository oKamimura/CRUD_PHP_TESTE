<?php
require 'config.php';

    $id = filter_input(INPUT_GET, 'id');

    if($id) {

        //log
        $datalog = date('d-m-Y H:i:s');
        $arquivolog = fopen('logs.txt', 'a+', 0);
        $texto = 'O Contato (id: '.$id. ') foi deletado. Data: '.$datalog."\n";
        fwrite($arquivolog,$texto);
        fclose($arquivolog);
        //log

        $sql = $conn->prepare("DELETE FROM contato WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
    }

    header("Location: index.php");