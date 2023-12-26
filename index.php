<?php

require_once('../loteria/controller/lotofacil.php');
require_once('../loteria/controller/quina.php');
require_once('../loteria/controller/mega_sena.php');
require_once('../loteria/controller/lotomania.php');

session_start();
$token = bin2hex(random_bytes(32));
$_SESSION['csrf_token'] = $token;

if(!isset($_POST['sortear'])){
    $megaSena = megaSena();
    $strMega = implode(',',$megaSena);

    $loto = lotofacil();
    $strLoto = implode(',',$loto);

    $quina = quina();
    $strQuina = implode(',',$quina);

    $lotomania = lotomania();
    $strMania = implode(',',$lotomania);
}else{
    $megaSena = megaSena();
    $strMega = implode(',',$megaSena);

    $loto = lotofacil();
    $strLoto = implode(',',$loto);

    $quina = quina();
    $strQuina = implode(',',$quina);

    $lotomania = lotomania();
    $strMania = implode(',',$lotomania);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loteria</title>
    <link rel="stylesheet" href="style.css">
    <link rel ="icon" href="../loteria/image/favicon.ico">
</head>
<body>
    <div class="container">

        <div class="megaSena">
            <h1>Mega Sena</h1>
            <?php
                foreach($megaSena as $number){
                    echo "<input type='text' id='valor' value='$number'>";
                }
                
            ?>
            <form action="../loteria/view/salvarJogo.php" method="post">

            <?php
                echo "<input type='hidden' name='csrf_token' class='ocultoMega' value='$token'>";
                echo "<input type='text' name='salvarMega' class='ocultoMega' value='$strMega'>";
            ?>

            <input type="submit" name="salvar" class="btnSalvar" value="Salvar">
            </form>
        </div>
        <br/>

        <div class="lotoFacil">
        <h1>Lotofácil</h1>
            <?php
                foreach($loto as $number){
                    echo "<input type='text' id='valor' value='$number'>";
                }
                
            ?>
            <form action="../loteria/view/salvarJogo.php" method="post">

            <?php
                echo "<input type='hidden' name='csrf_token' class='ocultoMega' value='$token'>";
                echo "<input type='text' name='salvarLoto' class='ocultoMega' value='$strLoto'>";
   
            ?>

            <input type="submit" name="salvar" class="btnSalvar" value="Salvar">
            </form>
        </div>
        <br/>

        <div class="Quina">
        <h1>Quina</h1>
            <?php
                foreach($quina as $number){
                    echo "<input type='text' id='valor' value='$number'>";
                }
                
            ?>
            <form action="../loteria/view/salvarJogo.php" method="post">

            <?php
                echo "<input type='hidden' name='csrf_token' class='ocultoMega' value='$token'>";
                echo "<input type='text' name='salvarQuina' class='ocultoMega' value='$strQuina'>";
 
            ?>

            <input type="submit" name="salvar" class="btnSalvar" value="Salvar">
            </form>
        </div>

        <br/>

        <div class="lotoMania">
        <h1>Lotomania</h1>
            <?php
                foreach($lotomania as $number){
                    echo "<input type='text' id='valor' value='$number'>";
                }
                
            ?>
            <form action="../loteria/view/salvarJogo.php" method="post">

            <?php
                echo "<input type='hidden' name='csrf_token' class='ocultoMega' value='$token'>";
                echo "<input type='text' name='salvarMania' class='ocultoMega' value='$strMania'>";
            ?>

            <input type="submit" name="salvar" class="btnSalvar" value="Salvar">
            </form>

        </div>
        <br/><br/>
    </div>

    <div class="container">
        <form action="index.php" method="post">

            <input type="submit" name="sortear" class="sortear" value="Sortear">
        </form>
        <a href="../loteria/view/salvarJogo.php"><input type="submit" name="listar" class="sortear" value="Listar Jogos"></a>

    </div>
    
</body>
</html>