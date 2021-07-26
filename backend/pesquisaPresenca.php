<?php
error_reporting(0);
include('conecta.php');

$titulo_aula=$_POST['TITULO_AULA'];
$nome_aluno=$_POST['NOME_ALUNO'];
$data_menor=$_POST['MENOR_DATA'];
$data_maior=$_POST['MAIOR_DATA'];
$data=$_POST["CHECK_DATA"];

$nada=0;

if($data=="on"){
    $seleciona=mysqli_query($conexao, 
        "SELECT presenca_aula.ID ID,DATE_FORMAT(aula.DATA_AULA, '%d/%m/%Y') DATA_AULA, presenca_aula.PRESENTE PRESENTE,aula.TITULO TITULO_AULA,aluno.NOME NOME_ALUNO 
        FROM presenca_aula,aula,aluno 
        WHERE presenca_aula.ID_ALUNO = aluno.ID 
        AND presenca_aula.ID_AULA = aula.ID 
        AND aula.TITULO LIKE '%$titulo_aula%'
        AND aluno.NOME LIKE '%$nome_aluno%'
        AND aula.DATA_AULA BETWEEN '$data_menor' AND '$data_maior'
        ORDER BY aula.DATA_AULA DESC;
");
}else{
    $seleciona=mysqli_query($conexao, 
        "SELECT presenca_aula.ID ID,DATE_FORMAT(aula.DATA_AULA, '%d/%m/%Y') DATA_AULA, presenca_aula.PRESENTE PRESENTE,aula.TITULO TITULO_AULA,aluno.NOME NOME_ALUNO 
        FROM presenca_aula,aula,aluno 
        WHERE presenca_aula.ID_ALUNO = aluno.ID 
        AND presenca_aula.ID_AULA = aula.ID 
        AND aula.TITULO LIKE '%$titulo_aula%'
        AND aluno.NOME LIKE '%$nome_aluno%'
        ORDER BY aula.DATA_AULA DESC;
    ");
}


while($campo=mysqli_fetch_array($seleciona)){
    $nada=1;
    echo"<tr class=\"align-middle\">
            <th class=\"text-center\" scope=\"row\">";echo$campo["ID"];echo"</th>
            <td><span>";echo $campo["DATA_AULA"];echo"</span></td>
            <td class=\"align-middle text-center\">
                <span class=\"form-check align-self-center\">
                    <input class=\"form-check-input float-none\" type=\"checkbox\" "; if($campo["PRESENTE"]==1){echo" checked ";} echo" disabled>
                </span>
            </td>
            <td>";echo$campo["TITULO_AULA"];echo"</td>
            <td>";echo$campo["NOME_ALUNO"];echo"</td>
            <td class=\"align-middle text-center acao-item\"><a class=\"btn btn-outline-warning p-2 pt-1 pb-1\" href=\"editarPresenca.php?ID=";echo $campo["ID"];echo"\"><img class=\"icone-item\" src=\"icon\lapis.svg\"/></a></td>
            <td class=\"align-middle text-center acao-item\"><a class=\"btn btn-outline-danger  p-2 pt-1 pb-1\" href=\"excluirPresenca.php?ID=";echo $campo["ID"];echo"\"><img class=\"icone-item\" src=\"icon\lixo.svg\"/></a></td>
        <tr>";
}
if($nada==0){
    echo("<tr><th class=\"bg-secondary text-white text-center\" colspan=\"8\">Nenhuma correspondência</th></tr>");
}
?>