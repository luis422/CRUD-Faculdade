<?php
    include("conecta.php");

    $cpf=$_POST["CPF"];

    //pega o id do professor a ser excluído
    $selecionaProf=mysqli_query($conexao, "SELECT ID FROM professor WHERE CPF = '$cpf'");
    $professor=mysqli_fetch_array($selecionaProf);

    //pega o id de todas as aulas que o professor lecionava
    $selecionaAula=mysqli_query($conexao, "SELECT ID FROM aula WHERE ID_PROFESSOR = ".$professor["ID"]);
    

    //deleta todas as presenças das aulas que o professor lecionava
    while ($aula=mysqli_fetch_array($selecionaAula)) {
        mysqli_query($conexao, "DELETE FROM presenca_aula WHERE presenca_aula.ID_AULA = ".$aula["ID"]);
        //PS: como a intenção é excluir o professor,
        // precisa do while para excluir todas as presenças
        // de todas as aulas que o professor lecionava, se fosse
        // somente uma aula (um ID de aula), só uma query seria
        // o suficiente, mas como são várias aulas diferentes,
        // é necessário fazer uma query para cada id da aula.
    }
    
    //deleta todas as aulas que o professor estava lecionando
    mysqli_query($conexao, "DELETE FROM aula WHERE aula.ID_PROFESSOR = ".$professor["ID"]);

    //deleta o professor
    mysqli_query($conexao, "DELETE FROM professor WHERE CPF='$cpf'");
    
    header("location:../concluido.html");
?>