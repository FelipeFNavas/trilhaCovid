<?php
header('Access-Control-Allow-Origin: *');

// Definindo Servidor, Nome de UsuÃ¡rio, Senha e Banco de Dados
$servername = "localhost";
$username = 'id17945054_admin';
$password = 'UchihaItachi42!';
$database = 'id17945054_trilhacovid';


// Criando a ConexÃ£o
$connection = new mysqli($servername, $username, $password, $database);

//Query de seleÃ§Ã£o
$query = mysqli_query($connection, "SELECT COUNT(*) AS qtd_questoes FROM `questions`");

//Seleciona a quantidade de questoes salvas no banco de dados
//echo $query['qtd_questoes'];

while($rows=mysqli_fetch_array($query)){

  echo $rows['qtd_questoes'];

}


mysqli_close($connection);
?>