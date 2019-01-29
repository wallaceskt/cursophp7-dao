<?php

require_once("config.php");

$sql = new DadosSQL();
//$usuarios = $sql->select("SELECT * FROM usuarios");
//$usuarios = $sql->update("UPDATE usuarios SET login = 'john', senha = 'rambo' WHERE id = 11");

echo "<pre>";
//echo json_encode($usuarios);
echo "<br>";
$usuario = new Usuario();
$usuario->atualizar("fernanda", "fkfc", 7);
echo "<br>";
$usuario->loadById(7);
echo $usuario;
echo "<br>";
echo $usuario->excluir(18);
echo "<br>";
/*
define("HOST", "localhost");
define("DBNAME", "dbphp7");
define("CHARSET", "uft8");
define("USER", "root");
define("PASSWORD", "root");
echo "mysql:host=" . HOST . ";dbname=" . DBNAME . ";charset=" . CHARSET . ";", USER, PASSWORD;
*/
echo "</pre>";

?>