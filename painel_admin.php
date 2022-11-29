<?php
	include("valida_sessao.php");
	if (!isset($_SESSION)) {
		session_start();
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Hair.exe</title>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="CSS/style4.css"> 
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
	</head>
	<body>
	      <div class="side-bar">
        <div class="logo-name">
            <h1>Hair.exe</h1>   
    </div>
		<script type="text/javascript">
			
			function mascaraTelefone(event) {
        		let tecla = event.key;
        		let telefone = event.target.value.replace(/\D+/g, "");

        		if (/^[0-9]$/i.test(tecla)) {
            		telefone = telefone + tecla;
            		let tamanho = telefone.length;

            		if (tamanho >= 12) {
                		return false;
            		}
            
            		if (tamanho > 10) {
                		telefone = telefone.replace(/^(\d\d)(\d{5})(\d{4}).*/, "($1) $2-$3");
            		} else if (tamanho > 5) {
                		telefone = telefone.replace(/^(\d\d)(\d{4})(\d{0,4}).*/, "($1) $2-$3");
            		} else if (tamanho > 2) {
                		telefone = telefone.replace(/^(\d\d)(\d{0,5})/, "($1) $2");
            		} else {
                		telefone = telefone.replace(/^(\d*)/, "($1");
            		}	

            		event.target.value = telefone;
        		}

        		if (!["Backspace", "Delete"].includes(tecla)) {
            		return false;
        		}
    	}
		</script>
<div class="pa">
    <div class="image">
     <img src="img/admin.png"></div>
		<h2>Painel Admin</h2></div>
		<li><div class="bv">
			<?php
				echo "Bem vindo, " .$_SESSION['nomeUsuario'];
			?> </div>
			</li>
		<hr/>
		<li><p><b>Dados Cadastrais</b></p></li><li>
		<?php
			echo "Nome:     " .$_SESSION['nomeUsuario']. "<br/><br/>";
			echo "CPF:      " .$_SESSION['cpfUsuario']. "<br/><br/>";
			echo "E-mail:   " .$_SESSION['emailUsuario']. "<br/><br/>";
			echo "Telefone: " .$_SESSION['telefoneUsuario']. "<br/><br/>";

			//Agendamento
			//Historico
			//Dados Cadastrais(alterar(perfil))
			//Promoção

		?>
		<hr/>
		</li>
		</div>
		</br>
		<div class="back">
		<h3>Usuário cadastrados</h3>
<div class="container">
	
	<div class="table">
		<div class="table-header">
		<?php

			include("conexao_banco.php");

			$sql = "SELECT * FROM cadastro_usuario WHERE cpf_usuario != '" . $_SESSION['cpfUsuario']."' ";

			$result = mysqli_query($conexao, $sql);

			$row = mysqli_num_rows($result);

			if ($row == 0) {
				echo "<h3>Nenhum usuário encontrado...</h3>";
			}else{

		?>

		<table border = 1px>
			<tr>
				<th>
					ID
			    </th>
				<th>
					Nome
				</th>
				<th>
					E-Mail
				</th>
				<th>
					Telefone
				</th>
				<th>
					Editar
				</th>
				<th>
					Excluir
				</th>
			</tr>
		<?php
			while ($row = mysqli_fetch_array($result)) {
				echo "<tr>";
				echo "<td>".$row['id_usuario']."</td>";
				echo "<td>".$row['nome_usuario']."</td>";
				echo "<td>".$row['email_usuario']."</td>";
				echo "<td>".$row['telefone_usuario']."</td>";
				echo "<td><button type='button' onclick='puxaId(".$row['id_usuario'].");' id='idUsuario' class='btn btn-primary btn-sm' data-bs-toggle='modal' data-bs-target='#exampleModal' data-bs-whatever='".$row['id_usuario']."'>
  					Editar
				</button></td>";
				echo "<td><button type='button' class='btn btn-primary btn-sm'><a href='funcoes.php?id=".$row['id_usuario']." '><font color='white'>Excluir</font></a></button></td>";
				echo "</tr>";

		}?>
		<?php } ?>
		</table>

		<hr/>
		
		</div>	
	</div>
</div>
		
		<h3>Agendamentos</h3>
		<div class="container">
	
	<div class="table">
		<div class="table-header">
		<?php

			include("conexao_banco.php");

			$sql = "SELECT * FROM agendamento WHERE id_usuario != '" . $_SESSION['idUsuario']."' ";

			$result = mysqli_query($conexao, $sql);

			$row = mysqli_num_rows($result);

			if ($row == 0) {
				echo "<h3>Nenhum agendamento encontrado...</h3>";
			}else{

		?>

		<table border = 1px>
			<tr>
				<th>
					ID Agendamento
			    </th>
				<th>
					Cliente
				</th>
				<th>
					Contato
				</th>
				<th>
					Corte
				</th>
				<th>
					Valor
				</th>
				<th>
					Data
				</th>
			</tr>
					</div>	
	</div>
</div>
		<?php
			while ($row = mysqli_fetch_array($result)) {
				echo "<tr>";
				echo "<td>".$row['id_agendamento']."</td>";
				echo "<td>".$row['nm_usuario']."</td>";
				echo "<td>".$row['telefone_usuario']."</td>";
				echo "<td>".$row['tipo_corte']."</td>";
				echo "<td>"."R$".$row['vl_corte'] = number_format($row['vl_corte'],2,",",".")."</td>";
				echo "<td>".date('d-m-Y',strtotime($row['dt_agendamento']))."</td>";
				echo "</tr>";

		}?>
		<?php } ?>
		</table>
		<?php
			$sql = "SELECT SUM(vl_corte) AS soma FROM agendamento";
			$result = mysqli_query($conexao, $sql);
			$row = mysqli_num_rows($result);
			while($row = mysqli_fetch_array($result)){
				echo "<p>Ganhos totais: R$".$row['soma'] = number_format($row['soma'],2,",",".")."</p>";
			}
		?>
		
		<div class="desc">
		<p><a class="button-two" href="desconecta_usuario.php">Desconectar</a></p>
		</div>
		<!-- Modal -->
			<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  				<div class="modal-dialog">
    				<div class="modal-content">
      					<div class="modal-header">
        					<h1>Dados Cadastrais:</h1>
      					</div>
      				<div class="modal-body">
        				<form action="update_usuario.php" id="form_edit" method="POST">
          					<div class="mb-3">
          						<input type="hidden" id="updateid" name="updateid" value="">

            					<label>Novo Nome:</label><br>
            					<input type="text" name="nome_usuario_update" placeholder="Atualize seu nome..." required>

            					<br>

            					<label>Novo Email:</label><br>
            					<input type="email" name="email_usuario_update" placeholder="Atualize seu E-mail..." required>

            					<br>

            					<label>Novo Telefone:</label><br>
            					<input type="text" onkeydown="return mascaraTelefone(event)" name="telefone_usuario_update" placeholder="Atualize seu telefone..." required>
          					</div>
        				
      				</div>
      				<div class="modal-footer">
        				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        				<button type="submit"  name="envia_update_usuario" class="btn btn-primary">Atualizar</button>
        				</form>
      				</div>
    				</div>
  				</div>
			</div>

		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
		<script type="text/javascript">

			function puxaId(id){
				document.getElementById('updateid').value=id;
			}

		</script>
</div>
	</body>
</html>
