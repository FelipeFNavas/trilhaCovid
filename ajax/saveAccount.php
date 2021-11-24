
<?php

// Definindo Servidor, Nome de Usuário, Senha e Banco de Dados
$servername = "localhost";
$username = 'id17945054_admin';
$password = 'UchihaItachi42!';
$database = 'id17945054_trilhacovid';

// Criando a ConexÃ£o
$connection = new mysqli($servername, $username, $password, $database);

if(isset($_GET['email']) && isset($_GET['password']) && isset($_GET['name']) && isset($_GET['age'])){

     //Lightly sanitize the GET's to prevent SQL injections and possible XSS attacks
     $name = $_GET['name'];
     $password = $_GET['password'];
     $email = $_GET['email'];
     $age = $_GET['age'];

     $query = mysqli_query($connection, "INSERT INTO players(id_player, name, email, password, age) VALUES(null, '{$name}', '{$email}', '{$password}', '{$age}')");

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