<?php
	//Recebe os dados da página de login
	$cpfUsuario	  = $_POST['cpf_usuario'];
	$senhaUsuario = $_POST['senha_usuario'];

	//Verifica se existe conteudo nas variaveis
	if (isset($cpfUsuario) || isset($senhaUsuario)) {
		
		//Inicia conexão com o banco de dados
		include("conexao_banco.php");

		//Select para verificar se existe dado igual no banco de dados
		$sql = "SELECT * FROM cadastro_usuario WHERE cpf_usuario = '$cpfUsuario' AND senha_usuario = '$senhaUsuario'";

			//Executa o select
			$result = mysqli_query($conexao, $sql);

			//Retorna o numero de linhas existentes
			$linhaTabela = mysqli_num_rows($result);

			//Verifica se existe apenas 1 cadastro no banco igual informado no painel de login
			if ($linhaTabela == 1) {
			
				//Associa os dados do banco na variavel usuario
				$usuario = mysqli_fetch_assoc($result);

				//Verifica se existe conexão, caso não exista ele inicia uma nova sessão
				if (!isset($_SESSION)) {
					session_start();
				}

				//Passando os dados do banco de dados para as variaveis de sessão
				$_SESSION['nomeUsuario']     = $usuario['nome_usuario'];
				$_SESSION['cpfUsuario']      = $usuario['cpf_usuario'];
				$_SESSION['emailUsuario']    = $usuario['email_usuario'];
				$_SESSION['telefoneUsuario'] = $usuario['telefone_usuario'];
				$_SESSION['tipoUsuario']     = $usuario['tipo_usuario'];
				$_SESSION['idUsuario']       = $usuario['id_usuario'];

				//Direciona para página do usuário
				//header("refresh:0.1; url= https://hairexe.000webhostapp.com/painel_usuario.php");
			
				if ($_SESSION['tipoUsuario'] == 1) {

					echo "<script> window.location='painel_admin.php'; </script>";

				}else{
				
					echo "<script> window.location='painel_usuario.php'; </script>";
				}

			}else{

			echo "<script> alert('Usúário não encontrado'); window.location='login_usuario.php'; </script>";
			}
		

	}
?>