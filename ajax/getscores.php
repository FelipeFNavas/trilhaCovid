<?php
header('Access-Control-Allow-Origin: *');

// Definindo Servidor, Nome de UsuÃ¡rio, Senha e Banco de Dados
include('bdConfig.php');


// Criando a ConexÃ£o
$connection = new mysqli($servername, $username, $password, $database);

//Query de seleÃ§Ã£o
$query = mysqli_query($connection, "SELECT * FROM scores ORDER BY score DESC LIMIT 10");

//Seleciona dados de cada linha
while($rows=mysqli_fetch_array($query)){

  echo $rows['name'] . "|" . $rows['score'] . "|";

}

mysqli_close($connection);
?>