<?php
    include("conecta.php");

    $id=$_POST["ID"];
    $nome=$_POST["NOME"];
    $cpf=$_POST["CPF"];
    $telefone=$_POST["TELEFONE_RESPONSAVEL"];
    $idade=$_POST["IDADE"];
    $nome_responsavel=$_POST["NOME_RESPONSAVEL"];

    try{
        mysqli_query($conexao, "UPDATE aluno SET NOME='$nome', CPF='$cpf', TELEFONE_RESPONSAVEL='$telefone', IDADE='$idade', NOME_RESPONSAVEL='$nome_responsavel' WHERE ID=$id");
        header("location:../concluido.html");
    } catch(Exception $e){
        header("location:../erro.php?e=$e");
    }
?>