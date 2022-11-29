<?php

	
	$idUsuario          = $_POST['updateid'];
	$updateNomeUsuario  = $_POST['nome_usuario_update'];
	$updateEmailUsuario = $_POST['email_usuario_update'];
	$updateTelUsuario   = $_POST['telefone_usuario_update'];

	$id = json_decode($idUsuario, true);

	include("conexao_banco.php");
	
	if(!$idUsuario || !$updateNomeUsuario || !$updateEmailUsuario || !$updateTelUsuario){
		echo "<script> alert('Erro ao efetuar atualização!'); window.location='painel_admin.php';</script>";
	}else{

		$sql = "UPDATE cadastro_usuario SET nome_usuario='$updateNomeUsuario', email_usuario='$updateEmailUsuario', telefone_usuario='$updateTelUsuario' WHERE id_usuario='$id'";


		$result = mysqli_query($conexao, $sql);

		 if ($result) {
		 	echo "<script> alert('Dados atualizados com sucesso!'); window.location='painel_admin.php';</script>";
		 }else{
		 	echo "<script> alert('Desculpe, erro inesperado!'); window.location='painel_admin.php';</script>";
		 }
	}
?>