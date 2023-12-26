<?php

require_once('../model/database.php');
require_once('../model/crud.php');

session_start();

$tabela = "loteria";

$megaSena = filter_input(INPUT_POST, 'salvarMega');
$megaLoto = filter_input(INPUT_POST, 'salvarLoto');
$megaQuina = filter_input(INPUT_POST, 'salvarQuina');
$megaMania = filter_input(INPUT_POST, 'salvarMania');

$conexao = Database::getConexao();
$crud = new Crud($conexao);

if(!empty($megaSena) && isset($_POST['csrf_token']) && isset($_POST['csrf_token']) === $_SESSION['csrf_token']){

    // primeiro o $megaMania puxando os numeros e $megaMania depois o tipo de jogo, se existir algo escreve como o nome do jogo, se não ele joga como nulo
    $crud->insert($tabela, $megaSena, $megaSena ? 'Mega Sena' : '');

    $megaSena = "";
    unset($_SESSION['csrf_token']);


} else if(!empty($megaLoto) && isset($_POST['csrf_token']) && isset($_POST['csrf_token']) === $_SESSION['csrf_token']){

    $crud->insert($tabela, $megaLoto, $megaLoto ? 'Lotofacil' : '');

    $megaLoto = "";
    unset($_SESSION['csrf_token']);

} else if(!empty($megaQuina) && isset($_POST['csrf_token']) && isset($_POST['csrf_token']) === $_SESSION['csrf_token']){

    $crud->insert($tabela, $megaQuina, $megaQuina ? 'Quina' : '');

    $megaQuina = "";
    unset($_SESSION['csrf_token']);
}
else if(!empty($megaMania) && isset($_POST['csrf_token']) && isset($_POST['csrf_token']) === $_SESSION['csrf_token']){

    $crud->insert($tabela, $megaMania, $megaMania ? 'Lotomania' : ''); 

    $megaMania = "";
    unset($_SESSION['csrf_token']);

}

$dados = $crud->listar($tabela);




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Jogos</title>
    <link rel="stylesheet" href="../style.css">
    <link rel ="icon" href="../loteria/image/favicon.ico">
</head>
<body>
    <a href="../index.php">Retornar a Aréa de Jogos</a>
    <br/><br/>
    <div class="containerTable">
        <table border="1">
            <tr>
                <th>Números</th>
                <th>Tipo</th>
            </tr>
            
            <?php
                while($row = $dados->fetch(PDO::FETCH_ASSOC)){
                    echo "<tr>";
                        echo "<td>{$row['jogos']}</td>";
                        echo "<td>{$row['tipo_jogo']}</td>";
                    echo "</tr>";
                }
            ?>
                
        </table>
    </div>
</body>
</html>
