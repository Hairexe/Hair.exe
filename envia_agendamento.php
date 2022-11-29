<?php
	include("valida_sessao.php");

	if (!isset($_POST['envia_agendamento'])) {
			header('Location: painel_usuario.php');
		}
	if(!isset($_POST['tipo_corte']) || !isset($_POST['data_agendamento'])){
	    echo "<script>alert('Erro ao receber informações!'); window.location='painel_usuario.php'; </script>";
	}
	$tipoCorte = $_POST['tipo_corte'];
	$dataAgendamento = $_POST['data_agendamento'];

	if ($tipoCorte == "corte1") {

		$valorCorte = 25;

	}elseif ($tipoCorte == "corte2") {

		$valorCorte = 10;

	}elseif ($tipoCorte == "corte3") {

		$valorCorte = 30;
	}

	$idUsuario   = $_SESSION['idUsuario'];
	$nomeUsuario = $_SESSION['nomeUsuario'];
	$telUsuario  = $_SESSION['telefoneUsuario'];

	include("conexao_banco.php");

	$sql = "INSERT INTO agendamento (id_usuario, nm_usuario, telefone_usuario, tipo_corte, vl_corte, dt_agendamento) VALUES ('$idUsuario', '$nomeUsuario','$telUsuario', '$tipoCorte', '$valorCorte', '$dataAgendamento' )";


	$result = mysqli_query($conexao, $sql);

	//unset($conexao);

	if ($result) {
		echo "<script>alert('Agendamento efetuado com sucesso!'); window.location='painel_usuario.php'; </script>";
	}else{
		//echo "<script>alert('Erro ao efetuar agendamento!'); window.location='painel_usuario.php'; </script>";
		echo mysqli_error($conexao);
	}

?>