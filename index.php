<?php

include 'header.php';

?>

<html>
<head>
	<title>Euklides</title>
	<link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body>
	<p class=margin_form></p>
	<form class="form_buttons" method="POST">
		<input type="submit" value="Entrar" id="button_login" class="button_login" name="button_login"><br>
		<input type="submit" value="Criar Conta" id="button_cadastro" class="button_cadastro" name="button_cadastro"><br>
	</form>
	<div class="div_login_cadastro">
		<form id="form_login" class="form_login" method="POST" action="login.php">
			<p class=margin_campos></p>
			<label>E-mail</label><br><input class="campo" type="text" name="email" id="email"><br>
			<p class=margin_labels></p>
			<label>Senha</label><br><input class="campo" type="password" name="senha" id="senha"><br>
			<p class=margin_campos></p>
			<input type="submit" value="Entrar" id="entrar" name="entrar"><br>
			<!-- <a href="recuperar_senha.html">esqueci a senha</a> -->
			<!-- <a href="cadastro_view.php">Cadastre-se</a>-->
		</form>
		<form id="form_cadastro" class="form_cadastro" method="POST" action="cadastro.php">
			<p class=margin_campos></p>
			<label>Nome</label><br><input class="campo" type="text" name="nome" id="nome"><br>
			<p class=margin_labels></p>
			<label>E-mail</label><br><input class="campo" type="text" name="email" id="email"><br>
			<p class=margin_labels></p>
			<label>Senha</label><br><input class="campo" type="password" name="senha" id="senha"><br>
			<p class=margin_labels></p>
			<label>Confirmar a senha</label><br><input class="campo" type="password" name="rsenha" id="rsenha"><br>
			<p class=margin_campos></p>
			<input type="submit" value="Cadastrar" id="cadastrar" name="cadastrar"><br>
		</form>
	</div>
	<?php 
		//verifica se h� um par�metro nome na url, o que significa que um aluno est� fazendo CADASTRO
		if (isset($_GET['nome'])){
			//esconde o formul�rio do login e mostra o formul�rio do cadastro
			?>
			<script type='text/javascript'>
				document.getElementById("form_login").style.visibility = 'hidden';
				document.getElementById("form_cadastro").style.visibility = 'visible';
			</script>
			<?php 
			//verifica se h� o par�metro a��o na url e � igual a cadastro
		} else if ($_GET['acao'] == 'cadastro'){
			//esconde o formul�rio do login e mostra o formul�rio do cadastro
			?>
			<script type='text/javascript'>
				document.getElementById("form_login").style.visibility = 'hidden';
				document.getElementById("form_cadastro").style.visibility = 'visible';
			</script>
			<?php 
			//verifica se h� o par�metro a��o na url e � igual a login
		} else if ($_GET['acao'] == 'login'){
			//esconde o formul�rio do cadastro e mostra o formul�rio do login
			?>
			<script type='text/javascript'>
				document.getElementById("form_login").style.visibility = 'visible';
				document.getElementById("form_cadastro").style.visibility = 'hidden';
			</script>
			<?php 
			//qualquer outro jeito, mostra o login que � a forma padr�o
		} else {
			?>
			<script type='text/javascript'>
				document.getElementById("form_login").style.visibility = 'visible';
				document.getElementById("form_cadastro").style.visibility = 'hidden';
			</script>
			<?php 
		}
	?>
</body>
</html>

<?php

if(isset($_POST["button_login"])){
	?>
	<script type='text/javascript'>
		document.getElementById("form_login").style.visibility = 'visible';
		document.getElementById("form_cadastro").style.visibility = 'hidden';
	</script>
	<?php
}

if(isset($_POST["button_cadastro"])){
	//verifica se h� o par�metro sala na url
	if (isset($_GET['nome'])){
		//se existir, a vari�vel existe_sala recebe 1
		$existe_sala = isset($_GET['nome']);
		//se existir, a vari�vel nome_sala eid_professor recebe os valores que est�o na url
		$nome_sala = $_GET['nome'];
		$id_professor = $_GET['cod_prof'];
		// 	session_start();
		// 	$_SESSION['existe_sala'] = $existe_sala;
		// 	$_SESSION['sala'] = $sala;
		//se existir, as vari�veis s�o enviadas como cookies
		setcookie("existe_sala",$existe_sala);
		setcookie("sala",$nome_sala);
		setcookie("cod_prof",$id_professor);
	}else {
		//se n�o existir, s�o enviados os valores 0 e espa�o
		setcookie("existe_sala",0);
		setcookie("sala","");
		setcookie("cod_prof",0);
	}
	?>
	<script type='text/javascript'>
		document.getElementById("form_login").style.visibility = 'hidden';
		document.getElementById("form_cadastro").style.visibility = 'visible';
	</script>
	<?php
}

?>