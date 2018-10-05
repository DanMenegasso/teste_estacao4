<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8">
  <meta name="TST PHP" content="" author="Daniel Menegasso">

  <title>Estação4 - Teste PHP</title>

  <link href="assets/css/main.css" rel="stylesheet">

</head>

<body>
  <h1>Gerenciamento de Produtos</h1>
  <p>Insira os dados para criar o produto no bando de dados, nome e preço são obrigatórios.</p>

  <form action="php/produtos/create.php" method="POST">
    <table id="t01">
      <tr>
        <th>Nome</th>
        <th>Descrição</th>
        <th>Preço</th>
      </tr>
      <tr>
        <td><input type="text" name="nome" required></td>
        <td><input type="text" name="desc"></td>
        <td><input type="number" step="0.01" min="0" name="preco" required></td>
      </tr>
    </table><br>
    <button type="submit" class="ins-button">Inserir</button>
  </form>

  <br>
  <hr>
  <h2>Lista de Produtos</h2>
  <p>Lista em ordem alfabética, para alterar os dados do produto clique no botão 'Alterar', aparecerá na tela os campos para digitar os novos dados,
    para remover um produto do banco de dados é só clicar em 'Excluir'.</p>

  <table id="t01">
    <tr>
      <th>ID</th>
      <th>Nome</th>
      <th>Descrição</th>
      <th>Preço</th>
    </tr>
    <?php
                require 'php/conn/database.php';
                $pdo = Database::connect();
                $sql = "SELECT * FROM produtos ORDER BY nome";
                foreach ($pdo->query($sql) as $row) {
                    echo '<tr>';
                    echo '<td>'. $row['id'] . '</td>';
                    echo '<td>'. $row['nome'] . '</td>';
                    echo '<td>'. $row['descricao'] . '</td>';
                    echo '<td>'. $row['preco'] . '</td>';
                    echo '<td> <form action="php/produtos/delete.php">
                    <input type="hidden" value="'.$row['id'].'" name="id">
                    <button class="del-button" type="submit"> Excluir </button></form> </td>';

                    echo '<td> <button class="alt-button" onclick="openForm()" type="submit"> Alterar </button></td>';

                    echo '<td><div class="form-popup" id="myForm"><h2 class="popup" >Alteração de dados</h2><form action="php/produtos/update.php"  method="POST">
                    <input type="hidden" name="id" value="'.$row['id'].'">
                    <input type="text" name="nome" value="'.$row['nome'].'" required>
                    <input type="text" name="desc" value="'.$row['descricao'].'">
                    <input type="number" step="0.01" min="0" value="'.$row['preco'].'" name="preco" required>
                    <button class="ins-button" onclick="openForm()" type="submit"> Concluído </button>
                    </form></div></td>';
                    echo '</tr>';
                }
                Database::disconnect();
            ?>
  </table>
  
  <script>
    function openForm() {
      document.getElementById("myForm").style.display = "block";
    }

    function closeForm() {
      document.getElementById("myForm").style.display = "none";
    }
  </script>
</body>

</html>
