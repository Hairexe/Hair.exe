<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Hair.exe</title>
    <link rel="stylesheet" href="CSS/style3.css">
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
   			
   			i.setAttribute("minlength", "14");

		}
		
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

    <div class="box">
        <div class="img-box">
            <img src="img/imgs.png">
        </div>
        <div class="form-box">
            <h2>Criar Conta</h2>
            <p> Já possui uma conta? <a href="https://hairexe.000webhostapp.com/login_usuario.php">Login</a></p>
   
	<form method="POST" action="cadastra_usuario.php">
		<div class="input-group">
        <label for="nome_usuario">Nome</label>
            <input type="name" name="nome_usuario" id="nome_usuario" placeholder="Digite seu nome..." required />
            </div>

            <div class="input-group">
            <label for="cpf_usuario">CPF</label>
			<input oninput="mascara(this)" type="name" name="cpf_usuario" id="cpf_usuario" placeholder="Digite seu cpf" required />
            </div>

            <div class="input-group">
            <label for="email_usuario">Email</label>
			<input type="email" name="email_usuario" id="email_usuario" placeholder="Digite seu e-mail" required />
            </div>

            <div class="input-group">
            <label for="telefone_usuario">Telefone</label>
			<input type="name" onkeydown="return mascaraTelefone(event)" name="telefone_usuario" id="telefone_usuario" placeholder="Digite seu telefone" minlength="11" required />
            </div>

            <div class="input-group w50">
            <label for="senha_usuario">Senha</label>
			<input type="password" name="senha_usuario" id="senha_usuario" placeholder="Digite sua senha" required />
            </div>

            <div class="input-group w50">
            <label for="confirmar_senha_usuario">Confirmar Senha</label>
			<input type="password" name="confirmar_senha_usuario" id="confirmar_senha_usuario" placeholder="Digite novamente" required />
		    </div>

            <div class="input-group">
			<input type="submit" name="envia_cadastro_usuario" value="Cadastrar">
            </div>
	</form>
    </div>
    </div>
</body>
</html>