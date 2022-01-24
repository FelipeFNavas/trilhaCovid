<?php
header('Access-Control-Allow-Origin: *');

// Definindo Servidor, Nome de UsuÃ¡rio, Senha e Banco de Dados
include('bdConfig.php');


// Criando a ConexÃ£o
$connection = new mysqli($servername, $username, $password, $database);

//Query de seleÃ§Ã£o
$query = mysqli_query($connection, "SELECT * FROM questions");

//Seleciona dados de cada linha
while($rows=mysqli_fetch_array($query)){

  echo $rows['question'] . ";" . $rows['answer1'] . ";" . $rows['answer2'] . ";" . $rows['answer3'] . ";" . $rows['answer4'] . ";" . $rows['answerCorrect'] . ";" . $rows['link'] . ";" . $rows['id_question'] . ";" . $rows['description'] . "|";

}

mysqli_close($connection);
?>