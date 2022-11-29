<?php

	//Verifica se o formulario foi enviado corretamente, se não direciona para o index
	if (!isset($_POST['envia_cadastro_usuario'])) {
		header('Location: index.php');
	}

	//Pega os dados do formulario e aplica nas variaveis
	$nomeUsuario           = $_POST['nome_usuario'];
	$cpfUsuario            = $_POST['cpf_usuario'];
	$emailUsuario          = $_POST['email_usuario'];
	$telefoneUsuario       = $_POST['telefone_usuario']; 
	$senhaUsuario          = $_POST['senha_usuario']; 
	$confirmarSenhaUsuario = $_POST['confirmar_senha_usuario'];
	$tipoUsuario = 0;

	//Verifica se o campo "senha" e "confirmar senha" são iguais, se nao for, sera direcionado para o cadastro
	if ($senhaUsuario != $confirmarSenhaUsuario) {
		echo "<script>alert('As senhas digitadas não correspondem, favor verificar e tentar novamente!');</script>";
		header("refresh:0.1; cadastro_usuario.php");
	}

	//Inclui a conexão com o banco de dados
	include("conexao_banco.php");

	//Procura no banco por cpf's iguais
	$consultaCpf = "SELECT cpf_usuario FROM cadastro_usuario WHERE cpf_usuario = '$cpfUsuario'";

	//Executa a pesquisa
	$result = mysqli_query($conexao, $consultaCpf);

	//Fecha a conexão com o banco de dados
	unset($conexao);

	//Joga o resultado da pesquisa no banco na váriavel "$verificaCpf"
	$verificaCpf = mysqli_fetch_array($result);

	//Verifica se existe 1 ou mais cpf's iguais, se sim, exibe mensagem de erro
	if ($verificaCpf > 0){
		echo"<script>alert('Usuário já cadastrado com este CPF!!');</script>";
		header("refresh:0.1; cadastro_usuario.php");
	}else{

		//Verifica se existe conteúdo nas variaveis
		if (isset($nomeUsuario) && isset($cpfUsuario) && isset($emailUsuario) && isset($telefoneUsuario) && isset($senhaUsuario)) {

			//Inclui a conexão com o banco de dados
			include("conexao_banco.php");

			//Efetua o cadastro do usuario
			$sql = "INSERT INTO cadastro_usuario (tipo_usuario,nome_usuario,cpf_usuario,email_usuario,telefone_usuario,senha_usuario) VALUES ('$tipoUsuario','$nomeUsuario', '$cpfUsuario','$emailUsuario', '$telefoneUsuario', '$senhaUsuario')";

			//Manda o cadastro do usuario para a tabela "cadastro_usuario" no banco de dados
			mysqli_query($conexao, $sql);

			//Termina a conexão com o banco de dados
			unset($conexao);

			echo "<script>alert('Cadastro efetuado com sucesso!'); window.location='login_usuario.php'; </script>";
			//header("refresh:0.1; login_usuario.php");
		}
	}

?>