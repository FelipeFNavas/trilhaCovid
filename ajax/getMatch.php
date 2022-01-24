<?php
header('Access-Control-Allow-Origin: *');
// Definindo Servidor, Nome de Usuário, Senha e Banco de Dados
include('bdConfig.php');

// Criando a ConexÃ£o

$connection = new mysqli($servername, $username, $password, $database);

$id_player = $_GET['id_player'];

$query = mysqli_query($connection, "SELECT * FROM matches WHERE id_player = '{$id_player}' AND score = 0 ORDER BY id_match DESC LIMIT 1 ");  


  while($rows=mysqli_fetch_array($query)){

    echo $rows['id_match'];
  
  }
  if(!$query){

      echo 'There was a problem saving your account. Please try again later.';
      die("QUERY FAILED" . mysqli_error($connection));

  }

mysqli_close($connection);
?>