<?php
    include("conecta.php");

    $id_aluno=$_POST["ID_ALUNO"];
    $id_aula=$_POST["ID_AULA"];
    $presente=isset($_POST["PRESENTE"]);

    if($presente=="on"){
        $presente='1';
    }else{
        $presente='0';
    }

    mysqli_query($conexao, "INSERT INTO presenca_aula (ID_AULA, ID_ALUNO, PRESENTE) VALUES ($id_aula, $id_aluno, $presente)");
    
    header("location:../concluido.html");
?>