<?php
    include("conecta.php");

    $id=$_POST["ID"];
    $nome=$_POST["NOME"];
    $cpf=$_POST["CPF"];
    $telefone=$_POST["TELEFONE"];
    $idade=$_POST["IDADE"];
    $atividade_responsavel=$_POST["ATIVIDADE_RESPONSAVEL"];

    try{
        mysqli_query($conexao, "UPDATE professor SET NOME='$nome', CPF='$cpf', TELEFONE='$telefone', IDADE='$idade', ATIVIDADE_RESPONSAVEL='$atividade_responsavel' WHERE ID=$id");
        header("location:../concluido.html");
    } catch(Exception $e){
        header("location:../erro.php?e=$e");
    }
?>