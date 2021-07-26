<?php
error_reporting(0);
include("conecta.php");

$titulo=$_POST["TITULO_AULA"];
$nome_prof=$_POST["NOME_PROFESSOR"];
$data_menor=$_POST["MENOR_DATA"];
$data_maior=$_POST["MAIOR_DATA"];
$data=$_POST["CHECK_DATA"];

$nada=0;

if($data=="on"){
    $seleciona=mysqli_query($conexao, 
        "SELECT aula.ID,aula.TITULO,aula.DESCRICAO,aula.ID_PROFESSOR,
        DATE_FORMAT(aula.DATA_AULA, '%d/%m/%Y') DATA_AULA, professor.NOME NOME_PROFESSOR 
        FROM professor,aula 
        WHERE aula.TITULO LIKE \"%$titulo%\" 
        AND professor.NOME LIKE \"%$nome_prof%\"
        AND aula.DATA_AULA BETWEEN '$data_menor' AND '$data_maior'
        AND professor.ID=ID_PROFESSOR");
}else{
    $seleciona=mysqli_query($conexao, 
        "SELECT aula.ID,aula.TITULO,aula.DESCRICAO,aula.ID_PROFESSOR,
        DATE_FORMAT(aula.DATA_AULA, '%d/%m/%Y') DATA_AULA, professor.NOME NOME_PROFESSOR 
        FROM professor,aula 
        WHERE aula.TITULO LIKE \"%$titulo%\" 
        AND professor.NOME LIKE \"%$nome_prof%\"
        AND professor.ID=ID_PROFESSOR");
}

while($campo=mysqli_fetch_array($seleciona)){
    $nada=1;
    echo "<tr class=\"align-middle\">
            <th class=\"text-center p-0\" scope=\"row\">";echo $campo["ID"];echo "</th>
            <td>";echo $campo["TITULO"];echo "</td>
            <td>";echo $campo["DESCRICAO"];echo "</td>
            <td><span>";echo $campo["DATA_AULA"];echo "</span></td>
            <td>";echo $campo["ID_PROFESSOR"];echo "</td>
            <td>";echo $campo["NOME_PROFESSOR"];echo "</td>
            <td class=\"align-middle text-center acao-item\"><a class=\"btn btn-outline-warning p-2 pt-1 pb-1\"  href=\"editarAulas.php?ID=";echo $campo["ID"];echo "\"><img class=\"icone-item\" src=\"icon\lapis.svg\"/></a></td>
            <td class=\"align-middle text-center acao-item\"><a class=\"btn btn-outline-danger p-2 pt-1 pb-1\" href=\"excluirAulas.php?ID=";echo $campo["ID"];echo "\"><img class=\"icone-item\" src=\"icon\lixo.svg\"/></a></td>
        <tr>";
}
if($nada==0){
    echo("<tr><th class=\"bg-secondary text-white text-center\" colspan=\"8\">Nenhuma correspondência</th></tr>");
}
?>