<?php
    include("conecta.php");

    $id=$_POST["ID"];
    $id_aluno=$_POST["ID_ALUNO"];
    $id_aula=$_POST["ID_AULA"];
    $presente=$_POST["PRESENTE"];

    if($presente=="on"){
        $presente='1';
    }else{
        $presente='0';
    }

    try{
        mysqli_query($conexao, "UPDATE presenca_aula SET ID_ALUNO=$id_aluno, ID_AULA=$id_aula, PRESENTE=$presente WHERE ID=$id");
        header("location:../concluido.html");
    } catch(Exception $e){
        header("location:../erro.php?e=$e");
    }
?>