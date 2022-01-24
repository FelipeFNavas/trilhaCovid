<?php
header('Access-Control-Allow-Origin: *');
// Definindo Servidor, Nome de Usuário, Senha e Banco de Dados
include('bdConfig.php');

//Criando a ConexÃ£o
$connection = new mysqli($servername, $username, $password, $database);
 if(isset($_GET['id_player']) && isset($_GET['score']) && isset($_GET['id_match'])){
      //Lightly sanitize the GET's to prevent SQL injections and possible XSS attacks
     $id_player = $_GET['id_player'];
     $score = $_GET['score'];
     $id_match = $_GET['id_match'];

     $query = mysqli_query($connection, "UPDATE matches SET score = '{$score}' WHERE (id_match = '{$id_match}' and id_player = '{$id_player}')");
     if(!$query){
          echo($query);
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