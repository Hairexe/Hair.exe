<?php

//Adiciona as informações de acesso ao banco para as variáveis
$dbhost = "localhost";
$dbusername = "id19472091_hairexe";
$dbpassword = "Fatecpika10!";
$dbname = "id19472091_db_hair";

//Executa a conexao com o banco aplicando para a variavel "$conexao"
$conexao = new mysqli($dbhost, $dbusername, $dbpassword, $dbname);

//Dispara um erro de conexão na tela caso a mesma não tenha sido efetuada
if (!$conexao) {
	echo "<script>alert ('Falha na conexão com banco de dados!'); </script>";
	header("refresh:0.1; url=https://hairexe.000webhostapp.com/index.php");
}
?>