<?php
    require '../conn/database.php';
 
    if ( !empty($_POST)) {

            $nome = $_POST['nome'];
            $descricao = $_POST['desc'];
            $preco = $_POST['preco'];
            $id = $_POST['id'];
        
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE produtos set nome = ?, descricao = ?, preco =? WHERE id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($nome, $descricao, $preco, $id));
            Database::disconnect();
            header("Location: ../../index.php");
        } 
?>
        