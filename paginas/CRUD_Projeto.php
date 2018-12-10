<?php

 function create_projeto($id_usuario,$img,$classificacao,$descricao,$sobre,$preco,$categoria,$previa,$linkComprar){
	//Tratando valores de variáveis para não ter caracter que corrompa o BD
	$conexao = mysqli_connect("localhost","root","","getIdeia");
	$img = mysqli_real_escape_string($conexao,$img);
	$descricao = mysqli_real_escape_string($conexao,$descricao);
	$sobre = mysqli_real_escape_string($conexao,$sobre);
	$preco = mysqli_real_escape_string($conexao,$preco);
	$categoria = mysqli_real_escape_string($conexao,$categoria);
	$previa = mysqli_real_escape_string($conexao,$previa);
	$linkComprar = mysqli_real_escape_string($conexao,$linkComprar);
	$sql = "insert into projetos(id_usuarios,img,classificacao,descricao,sobre,preco,categoria,previa,linkComprar) values ('{$id_usuario}','{$img}','{$classificacao}','{$descricao}','{$sobre}','{$preco}','{$categoria}','{$previa}','{$linkComprar}');";
	$resultadoDaInsercao = mysqli_query($conexao, $sql);
    return $resultadoDaInsercao;
}

 function read_projeto($id){
	$conexao = mysqli_connect("localhost","root","","getIdeia");
	$sql = "select * from projetos where id = {$id}";
    $consult = mysqli_query($conexao, $sql);
    $result =  mysqli_fetch_assoc($consult);
    return $result;

}
 function todos_projetos(){
	$conexao = mysqli_connect("localhost","root","","getIdeia");
	$sql = "select * from projetos";
    return mysqli_query($conexao, $sql);

}

function remover_projeto($id){
   	$conexao = mysqli_connect("localhost","root","","getIdeia");
    $query = "delete from  projetos where id = {$id}";
    return mysqli_query($conexao,$query);
    }
function buscar($key){
	$conexao = mysqli_connect("localhost","root","","getIdeia");
	$sql= "SELECT * FROM projetos WHERE descricao LIKE '%".$key."%' ORDER BY descricao";
	return mysqli_query($conexao,$sql);
    
}