
<?php

// Definindo Servidor, Nome de Usuário, Senha e Banco de Dados
$servername = "localhost";
$username = 'id17646567_felipe';
$password = 'Ol9j$HBH)A9kP0@b';
$database = 'id17646567_trilhacovid';

// Criando a ConexÃ£o
$connection = new mysqli($servername, $username, $password, $database);

if(isset($_GET['name']) && isset($_GET['score'])){

     //Lightly sanitize the GET's to prevent SQL injections and possible XSS attacks
     $name = $_GET['name'];
     $score = $_GET['score'];

     $query = mysqli_query($connection, "INSERT INTO scores(id, name, score) VALUES(null, '{$name}', '{$score}')");

     if(!$query){

       echo 'There was a problem saving your score. Please try again later.';
   		 die("QUERY FAILED" . mysqli_error($connection));

   	}else{

       echo 'Your score was saved. Congrats!';

    }

}else{
     echo 'Your name or score wasnt passed in the request. Make sure you add ?name=NAME_HERE&score=1337 to the tags.';
}

mysqli_close($connection);
?>