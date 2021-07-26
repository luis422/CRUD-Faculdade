<?php
    include("conecta.php");

    $titulo=$_POST["TITULO"];
    $data_aula=$_POST["DATA_AULA"];
    $id_prof=$_POST["ID_PROFESSOR"];
    $descricao=$_POST["DESCRICAO"];
    //echo("INSERT INTO aula (TITULO, DATA_AULA, ID_PROFESSOR, DESCRICAO) VALUES ('$titulo', '$data_aula', $id_prof, '$descricao')");
    mysqli_query($conexao, "INSERT INTO aula (TITULO, DATA_AULA, ID_PROFESSOR, DESCRICAO) VALUES ('$titulo', '$data_aula', $id_prof, '$descricao')");

    header("location:../concluido.html");
?>