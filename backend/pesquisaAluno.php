<?php
include('conecta.php');

$campo=$_POST['campo'];
$search=$_POST['search'];
//echo("SELECT * FROM professor WHERE $search LIKE '%$campo%'");
$seleciona=mysqli_query($conexao, "SELECT * FROM aluno WHERE $search LIKE \"%$campo%\"");
$nada=0;
while($campo=mysqli_fetch_array($seleciona)){
    $nada=1;
    echo "<tr class=\"align-middle\">
            <th class=\"text-center\" scope=\"row\">";echo $campo["ID"];echo "</th>
            <td>";echo $campo["NOME"];echo "</td>
            <td>";echo $campo["CPF"];echo "</td>
            <td>";echo $campo["IDADE"];echo "</td>
            <td>";echo $campo["TELEFONE_RESPONSAVEL"];echo "</td>
            <td>";echo $campo["NOME_RESPONSAVEL"];echo "</td>
            <td class=\"align-middle text-center acao-item\"><a class=\"btn btn-outline-warning p-2 pt-1 pb-1\" href=\"editarAluno.php?CPF=";echo $campo["CPF"];echo "\"><img class=\"icone-item\" src=\"icon\lapis.svg\"/></a></td>
            <td class=\"align-middle text-center acao-item\"><a class=\"btn btn-outline-danger p-2 pt-1 pb-1\" href=\"excluirAlunos.php?CPF=";echo $campo["CPF"];echo "\"><img class=\"icone-item\" src=\"icon\lixo.svg\"/></a></td>
        <tr>";
}
if($nada==0){
    echo("<tr><th class=\"bg-secondary text-white text-center\" colspan=\"8\">Nenhuma correspondência</th></tr>");
}
?>