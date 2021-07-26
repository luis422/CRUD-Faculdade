<?php
    include("conecta.php");

    $id=$_POST["ID"];

    //deleta todas as presenças da aula a ser excluída
    mysqli_query($conexao, "DELETE FROM presenca_aula WHERE presenca_aula.ID_AULA = ".$id);
    
    //deleta a aula
    mysqli_query($conexao, "DELETE FROM aula WHERE ID=".$id);
    
    header("location:../concluido.html");
?>