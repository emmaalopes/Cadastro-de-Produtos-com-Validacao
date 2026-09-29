<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produtos</title>
</head>
<body>
    <form action="" method="post">
        <label for="nome">Nome do Produto:</label>
        <input type="text" name="nome"><br>

        <label for="preco">Preço:</label>
        <input type="text" name="preco">

        <button type="submit">Cadastrar</button>
    </form>

    <?php
    // Verifica se o formulário foi enviado 
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Recebe os valores enviados pelo formulário
        $nome = $_POST['nome'];
        $preco = $_POST['preco'];

        // VALIDAÇÕES EM PHP
        if (empty($nome)) {
            echo "<p id='msg' style='color:red;'>Erro: O nome do produto não pode ficar vazio.</p>";
        } elseif (!is_numeric($preco) || $preco <= 0) {
            echo "<p id='msg' style='color:red;'>Erro: O preço deve ser um número positivo.</p>";
        } else {
            // Conecta com o banco de dados MySQL 
            $servername = "localhost";
            $username = "root";
            $password = "Senai@118";
            $dbname = "exercicio";

            $conn = new mysqli($servername, $username, $password, $dbname);

            // Verifica a conexão
            if ($conn->connect_error) {
                die("Falha na conexão: " . $conn->connect_error);
            }

            // Insere o registro no Banco de Dados
            $sql = "INSERT INTO produtos (nome, preco) VALUES ('$nome', '$preco')";

            if ($conn->query($sql) === TRUE) {
                echo "<p id='msg' style='color: Darkgreen;'>Produto cadastrado com sucesso!</p>";
            } else {
                echo "<p id='msg' style='color:red;'>Erro ao cadastrar no banco de dados.</p>";
            }

            // Fecha a conexão
            $conn->close();
        }

        // Ocultar a mensagem após 5 segundos
        echo "
        <script>
            setTimeout(function() {
                var msg = document.getElementById('msg');
                if (msg) {
                    msg.style.display = 'none';
                }
            }, 5000);        
        </script>
        ";
    }
    ?>
</body>
</html>