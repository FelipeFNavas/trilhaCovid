<?php
header('Access-Control-Allow-Origin: *');

// Definindo Servidor, Nome de Usuário, Senha e Banco de Dados
$servername = "localhost";
$username = 'id17945054_admin';
$password = 'UchihaItachi42!';
$database = 'id17945054_trilhacovid';

// Criando a ConexÃ£o
$connection = new mysqli($servername, $username, $password, $database);
//echo("match = " + $_GET['id_match']);
//echo("question = " + $GET['id_question']);
//echo("walk = " + $GET['walk']);

if(isset($_GET['id_match']) && isset($_GET['id_question']) && isset($_GET['walk'])){

     //Lightly sanitize the GET's to prevent SQL injections and possible XSS attacks
     $id_match = $_GET['id_match'];
     $id_question = $_GET['id_question'];
     $walk = $_GET['walk'];
    

     $query = mysqli_query($connection, "INSERT INTO matches_questions(id_matchesQUestion, id_match, id_question, walk) VALUES(null, '{$id_match}', '{$id_question}', '{$walk}')");

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