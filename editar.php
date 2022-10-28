<?php 
    require 'config.php';

    $contato = [];
    $id = filter_input(INPUT_GET, 'id');

    if($id){
        $sql = $conn->prepare("SELECT * FROM contato WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();

        if($sql->rowCount() > 0){
            $contato = $sql->fetch(PDO::FETCH_ASSOC);
        }else{
            header("Location: index.php");
            exit;
        }
    }else{
        header("Location: index.php");
    }

?>

<link rel="stylesheet" href="style.css">
 <div class="container">
        <div class="content">
            <form method="POST" action="editarcontato.php">
                    <input type="hidden" name="id" value="<?=$contato['id'];?>"/>
                    <input id="nome_contato" name="nome_contato" placeholder="Digite nome do contato" value="<?=$contato['nome_contato'];?>"  />
                    <input id="idade_contato" name="idade_contato" placeholder="Digite a idade"  value="<?=$contato['idade_contato'];?>"/>
                    <input type="number" id="telefone_contato" name="telefone_contato" placeholder="Digite o telefone" value="<?=$contato['telefone_contato'];?>"/>
                    <input class="btn" type="submit" value="Editar" />   
            </form>
        </div>
</div>