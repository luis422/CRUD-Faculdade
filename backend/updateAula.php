<?php
    include("conecta.php");

    $id=$_POST["ID"];
    $titulo=$_POST["TITULO"];
    $data_aula=$_POST["DATA_AULA"];
    $id_prof=$_POST["ID_PROFESSOR"];
    $descricao=$_POST["DESCRICAO"];

    try{
        mysqli_query($conexao, "UPDATE aula SET TITULO='$titulo', DATA_AULA='$data_aula', ID_PROFESSOR='$id_prof', DESCRICAO='$descricao' WHERE ID=$id");
        header("location:../concluido.html");
    } catch(Exception $e){
        header("location:../erro.php?e=$e");
    }
?>