<?php
    include("conecta.php");

    $nome=$_POST["NOME"];
    $cpf=$_POST["CPF"];
    $telefone=$_POST["TELEFONE"];
    $idade=$_POST["IDADE"];
    $atividade_responsavel=$_POST["ATIVIDADE_RESPONSAVEL"];

    mysqli_query($conexao, "INSERT INTO professor (NOME, CPF, TELEFONE, IDADE, ATIVIDADE_RESPONSAVEL) VALUES ('$nome', '$cpf', '$telefone', $idade, '$atividade_responsavel')");

    header("location:../concluido.html");
?>