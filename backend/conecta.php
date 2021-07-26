<?php

	date_default_timezone_set('America/Sao_Paulo');

	try{
		$conexao=mysqli_connect("localhost", "root", "", "faculdade");//local
	}catch(Exception $e){
		header("location:../erro.php?e=$e");
	}
?>