<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Hair.exe</title>
	<link rel="stylesheet" href="CSS/style2.css">
</head>
<body>
	<script type="text/javascript">
		
		function mascara(i){
   
   		var v = i.value;
   
   		if(isNaN(v[v.length-1])){ // impede entrar outro caractere que não seja número
      		i.value = v.substring(0, v.length-1);
      		return;
   		}
   
   		i.setAttribute("maxlength", "14");
   		if (v.length == 3 || v.length == 7) i.value += ".";
   		if (v.length == 11) i.value += "-";

		}
		
	</script>
<section class="area-login">
	<div class="login">
	<div>
		<img src="img/logo.png">
	</div>
	<form method="POST" action="loga_usuario.php">
	<input oninput="mascara(this)" type="name" name="cpf_usuario" id="cpf_usuario" placeholder="Digite seu CPF" required />
		<input type="password" name="senha_usuario" id="senha_usuario" placeholder="Digite sua Senha" required />
		<input type="submit" name="envia_login_usuario" value="Acessar">
	</form>
	<p>Ainda não tem uma conta?<a href="https://hairexe.000webhostapp.com/cadastro_usuario.php">Criar conta</a></p>
	</div>
	</section>
</body>
</html>