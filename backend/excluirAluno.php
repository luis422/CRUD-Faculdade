<?php
    include("conecta.php");

    $cpf=$_POST["CPF"];

    $seleciona=mysqli_query($conexao, "SELECT ID FROM aluno WHERE CPF = '$cpf'");
    $campo=mysqli_fetch_array($seleciona);
    mysqli_query($conexao, "DELETE FROM presenca_aula WHERE presenca_aula.ID_ALUNO = ".$campo["ID"]);
    mysqli_query($conexao, "DELETE FROM aluno WHERE CPF='$cpf'");
    
    header("location:../concluido.html");
?>