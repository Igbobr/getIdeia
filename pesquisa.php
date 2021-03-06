<html>
  <head>
    <title>Procurar</title>
    <meta charset="utf-8">
	<link rel="shortcut icon" href="paginas/design/imagens/favicon.png" type="image/x-png" /> 
	<link rel="stylesheet" href="paginas/design/css/menu.css">
	<link rel="stylesheet" href="paginas/design/css/divisao.css">
	<link rel="stylesheet" href="paginas/design/css/form.css">
	<link rel="stylesheet" href="paginas/design/css/customSelect.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  </head>
  <body>
  	<?php
  		include 'paginas/CRUD_Projeto.php';
  		include 'paginas/fnLoginLogout.php';
       	include 'paginas/CRUD_Usuario.php';
  		//Se existir, definindo valor da pesquisa;
  		$pesquisa='';
  		if (array_key_exists('pesquisa', $_GET)) {
  			$pesquisa = $_GET['pesquisa'];
  			}	
  		//Definindo filtragem por categoria e editando select
  		if (array_key_exists('tipo_pesquisa', $_GET)) {
  			$tipo_pesquisa = $_GET['tipo_pesquisa'];
  		}else{
  			$tipo_pesquisa = 'todos';
  		}
  		if ($tipo_pesquisa == "programacao") {
  			$optins =  "<option value='todos'>Todos</option>
				        <option value='programacao' selected='selected'>Programação</option>
				        <option value='design' >Desing</option>
				        <option value='todos'>Todos</option>
				        ";
  		}elseif ($tipo_pesquisa =="design") {
  			
  			$optins =  "<option value='todos'>Todos</option>
  						<option value='todos'>Todos</option>
				        <option value='programacao' >Programação</option>
				        <option value='design' selected='selected'>Desing</option>";
  		}else{
  			$optins =  "<option value='todos' selected='selected'>Todos</option>
				        <option value='programacao' >Programação</option>
				        <option value='design' >Desing</option>";
  		}

  	?>
  	<div>
   		<div class="barra" >
   			<?php 

	          if (!isLogado()):
	         ?>
		   			<span class="barraCL">
		   				<a href="cadastrar.php#form">Cadastrar</a>
		   			</span> &nbsp&nbsp      
		   			
		   			<span class="barraCL">
		   				<a href="login.php">Login</a>
		   			</span>
	   		<?php endif ;
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
        <div class="content" align="center">
			
			<h1 class="frase">Projeto de gerenciamento de loja.</h1>
		
			<br><br>
			<div class="grupo" >
			<form method="GET" action="pesquisa.php">
				  <input class="form" type="text" id="pesquisa" placeholder="Buscar..." name="pesquisa" value="<?=$pesquisa?>" />
				  <div class="custom-select" style="width:200px;">
				  <select name="tipo_pesquisa">
					 <?php echo $optins; ?>
				  </select>
				  </div>
				  <button type="submit" name="submit" class="botao">Procurar</button>
			 </form>
			</div>
			<br>
			<br>
			
			
		</div>
		<?php
			if (array_key_exists('pesquisa', $_GET)) {
				$consulta= buscar($_GET['pesquisa']);
			}
			else{
				$consulta = todos_projetos();
			}
			while ($result = mysqli_fetch_assoc($consulta)){
				if ($tipo_pesquisa=="programacao") {
					if($result['categoria']=="programacao"){
						imprimir($result);
					}else{
						continue;
					}
				}elseif ($tipo_pesquisa=="design") {
					if($result['categoria']=="design"){
						imprimir($result);
					}else{
						continue;
					}
				}else{
					imprimir($result);
				}
			}
		?>
		<!-- Imprimindo Opções de projetos-->
		<?php
		function imprimir($projeto){
		?>
			<div class="projeto_pesquisa">
				<h3>Descrição: <?=$projeto['descricao'];?></h3>
				<br>
				<h5>Sobre:<?=substr($projeto['sobre'], 0,40).'...'?></h5>
					<div style="position: absolute; right: 10%; bottom: 20px;">
						<h4>Categoria: <?=$projeto['categoria'];?></h4>
						<br>
						<a href="showProjeto.php?id=<?=$projeto['id'];?>" class="botao">VER</a>
					</div>
				</div>
				<br>
		<?php } ?>	
	</section>
	<br>
	<br>
	<script>
			//Efeito de
			  function typeWriter(elemento) {
				const textoArray = elemento.innerHTML.split('');
				elemento.innerHTML = '';
				textoArray.forEach((letra, i) => {
				  setTimeout(() => elemento.innerHTML += letra, 75 * i);
				});
			  }
			  const titulo = document.querySelector('.frase');
			  typeWriter(titulo);

	</script>
	<script type="text/javascript" src="paginas/design/js/customSelect.js"></script>
<?php include("paginas/rodape.php"); ?>

		