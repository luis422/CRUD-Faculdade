<?php
    include("conecta.php");

    $nome=$_POST["NOME"];
    $cpf=$_POST["CPF"];
    $telefone=$_POST["TELEFONE_RESPONSAVEL"];
    $idade=$_POST["IDADE"];
    $nome_responsavel=$_POST["NOME_RESPONSAVEL"];
    
    mysqli_query($conexao, "INSERT INTO aluno (NOME, CPF, TELEFONE_RESPONSAVEL, IDADE, NOME_RESPONSAVEL) VALUES ('$nome', '$cpf', '$telefone', $idade, '$nome_responsavel')");

    header("location:../concluido.html");
?>