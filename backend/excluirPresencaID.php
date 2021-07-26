<?php
    include("conecta.php");

    $id=$_POST["ID"];
    try{
        mysqli_query($conexao, "DELETE FROM presenca_aula WHERE ID=$id");
        header("location:../concluido.html");
    }catch(Exception $e){
        header("location:../erro.php?e=$e");
    }
    
?>