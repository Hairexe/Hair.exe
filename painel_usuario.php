<?php
	include("valida_sessao.php");
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="CSS/style5.css"> 
		<title>Hair.exe</title>
	</head>
	<body>
	<div class="side-bar">
        <div class="logo-name">
            <h1>Hair.exe</h1>   
    </div><img src="img/user.png">
		<h2>Painel Usuário</h2>
		<li>
			<?php
				echo "Bem vindo, " .$_SESSION['nomeUsuario'];
			?>
		<hr/></li>
		<li><p><b>Dados Cadastrais</b></p></li><li>
		<?php
			echo "Nome:     " .$_SESSION['nomeUsuario']. "<br/><br/>";
			echo "CPF:      " .$_SESSION['cpfUsuario']. "<br/><br/>";
			echo "E-mail:   " .$_SESSION['emailUsuario']. "<br/><br/>";
			echo "Telefone: " .$_SESSION['telefoneUsuario']. "<br/><br/>";
		?>
		<hr/></li>
	</div>
	<div class="back">
	    </br>
		<h3>Agendamentos</h3></br>

		<h4>Efetuar novo agendamento:</h4></br>
		<form action="envia_agendamento.php" method="POST">
			<div>
				Nome: <input type="text" name="nome_usuario" value="<?php echo $_SESSION['nomeUsuario']; ?>" readonly>
			</div>
			<br>
			<div>
				Contato: <input type="text" name="telefone_usuario" value="<?php echo $_SESSION['telefoneUsuario']; ?>" readonly>
			</div>
			<br>
			<div>
				Data: <input type="date" name="data_agendamento" required>
			</div>
			<br>
			<div>
				Corte:
				<select name="tipo_corte">
  					<option value="corte1"selected>Cabelo (R$15,00)</option>
				  	<option value="corte2">Cabelo e Barba (R$25,00)</option>
				  	<option value="corte3">Pintura (R$40,00)</option>
				</select>
			</div>
			<br>
			
			<input type="submit" name="envia_agendamento" value="Agendar">
		
		</form>
		<hr/></br>		
		<h3>Histórico de agendamentos</h3></br>

		<?php
			include("conexao_banco.php");

			$sql = "SELECT * FROM agendamento WHERE id_usuario = '" . $_SESSION['idUsuario']."' ";

			$result = mysqli_query($conexao, $sql);

			$row = mysqli_num_rows($result);

			if ($row == 0) {
				echo "<h3>Nenhum agendamento encontrado...</h3>";
			}else{
		?>
	
		<table border="1px">
			<tr>
				<th>ID Agendamento</th><th>Tipo de Corte</th><th>Valor(R$)</th><th>Data</th>
			</tr>			
			<?php
			while ($row = mysqli_fetch_array($result)) {
				echo "<tr>";
				echo "<td>".$row['id_agendamento']."</td>";
				echo "<td>".$row['tipo_corte']."</td>";
				echo "<td>"."R$".$row['vl_corte'] = number_format($row['vl_corte'],2,",",".")."</td>";
				echo "<td>".$row['dt_agendamento'] = date('d/m/Y')."</td>";
				echo "</tr>";

			}?>
		<?php } ?>	
		</table>
	</br></br>
	<div class="desc">
		<p><a class="button-two" href="desconecta_usuario.php">Desconectar</a></p>
		</div></div>
	</body>
</html>