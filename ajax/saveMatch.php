<?php
header('Access-Control-Allow-Origin: *');
// Definindo Servidor, Nome de Usuário, Senha e Banco de Dados
$servername = "localhost";
$username = 'id17945054_admin';
$password = 'UchihaItachi42!';
$database = 'id17945054_trilhacovid';

date_default_timezone_set('America/Sao_Paulo');
$now = date('d/m/Y H:i');

//Criando a ConexÃ£o
$connection = new mysqli($servername, $username, $password, $database);
 if(isset($_GET['id_player']) && isset($_GET['score'])){
      //Lightly sanitize the GET's to prevent SQL injections and possible XSS attacks
     $id_player = $_GET['id_player'];
     $score = $_GET['score'];
     $query = mysqli_query($connection, "INSERT INTO matches(id_match, id_player, score, date) VALUES(null, '{$id_player}', '{$score}','{$now}')");
     if(!$query){
          echo 'There was a problem saving your account. Please try again later.';
    		die("QUERY FAILED" . mysqli_error($connection));
    	}else{
          echo 'Congrats!';
     }

 }else{
     echo 'Your name or score wasnt passed in the request. Make sure you add ?name=NAME_HERE&score=1337 to the tags.';
  }

mysqli_close($connection);
?>