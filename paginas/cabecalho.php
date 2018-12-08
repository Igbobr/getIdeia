
<html>
  <head>
    <title>getIdea</title>
	<link rel="shortcut icon" href="Paginas/design/imagens/favicon.png" type="image/x-png" /> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" href="paginas/design/css/menu.css">
	<link rel="stylesheet" href="paginas/design/css/divisao.css">
	<link rel="stylesheet" href="Paginas/design/css/form.css">
  </head>
  <body>
  	<div>
   		<div class="barra" >
   			<?php 
        include 'paginas/fnLoginLogout.php';
        include 'paginas/CRUD_Usuario.php';

          if (!isLogado()):
         ?>
   			<span class="barraCL">
   				<a href="cadastrar.php#form">Cadastrar</a>
   			</span> &nbsp&nbsp      
   			
   			<span class="barraCL">
   				<a href="login.php">Login</a>
   			</span>
   			<?php endif; 
         if (isLogado()):
           $email=$_SESSION['usuario_logado'];
           $usuario=read_usuario_email($email);
        ?>
   			
   			<span class="barraCL">
   				<a href="painel.php"><?=$usuario['nome']?></a>
   			</span> &nbsp&nbsp      
   			
   			<span class="barraCL">
   				<a href="paginas/logout.php">sair</a>
   			</span>
   		</div>
   		<?php endif ?>

   	</div>
   <section class="cor1">
        <div class="content">
			<center> 
			   <img width="250px" height="250px" src="Paginas/design/imagens/logo.png" alt="Participe!"> 
			      <font face="Futura Bk BT"><h1>getIDEA</h1></font>
				  <br>
				  <br>
			</center>
			<nav>
				<ul>
					<li><a href="index.php">Inicio</a>
					<li><a href="#">Como funciona?</a>
					<li><a href="pesquisa.php">Pesquisar</a>
					<li><a href="#">Sobre nós</a>
				</ul>
			</nav>
		</div>
	</section>