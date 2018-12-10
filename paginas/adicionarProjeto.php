 <?php 
include 'CRUD_Projeto.php';
include 'errors.php';
//Recebendo dados de CriarProjeto.php
$id_usuario = $_POST['id_usuarios'];
$img = '';
$descricao = $_POST['descricao'];
$preco = $_POST['preco'];
$sobre = $_POST ['sobre'];
$categoria = $_POST['categoria'];
$previa = $_POST['previa'];
$linkComprar = $_POST['linkComprar'];
$classificacao = 0;
;
 	//Valindando Descrição
   if (($descricao=="")||($descricao==' ')) {
       header("location: ../criarProjeto.php?error={$error[0]}");
       die();
    }elseif (mb_strlen($descricao)<5) {
      header("location: ../criarProjeto.php?error={$error[11]}");
      die();
    }
    //Validando Preço
    if (($preco=="")||($preco==' ')) {
       header("location: ../criarProjeto.php?error={$error[0]}");
       die(); 
    }elseif($preco < 0){
        echo "Preencha o preco com algum valor válido.";
        header("location: ../criarProjeto.php?error={$error[10]}");
        die();
    }

    //Valindando previa
    if (($previa=="")||($previa==' ')) {
       header("location: ../criarProjeto.php?error={$error[12]}");
       die();
    }elseif (mb_strlen($previa)<5) {
      header("location: ../criarProjeto.php?error={$error[12]}");
      die();
    }

    //Validando link de compra 
    if ( !isset( $linkComprar )|| !(filter_var( $linkComprar, FILTER_VALIDATE_URL ))) {
      header("Location: ../cadastrar.php?error={$error[13]}");
      die();
    }

create_projeto($id_usuario,$img,$classificacao,$descricao,$sobre,$preco,$categoria,$previa,$linkComprar);
header("location:../painel.php");
die();