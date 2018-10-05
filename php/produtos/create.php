<?php     
    require '../conn/database.php';
 
    if ( !empty($_POST)) {
        $nome = $_POST['nome'];
        $desc = $_POST['desc'];
        $preco = $_POST['preco'];

        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO produtos (nome, descricao, preco) values(?, ?, ?)";
        $q = $pdo->prepare($sql);
        $q->execute(array($nome, $desc, $preco));
        Database::disconnect();

        header("Location: ../../index.php");
    }
?>