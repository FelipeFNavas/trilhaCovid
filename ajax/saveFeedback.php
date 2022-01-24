
<?php

// Definindo Servidor, Nome de Usuário, Senha e Banco de Dados
include('bdConfig.php');

// Criando a ConexÃ£o
$connection = new mysqli($servername, $username, $password, $database);

if(isset($_GET['id_player']) && isset($_GET['id_match']) && isset($_GET['liked'])){

     //Lightly sanitize the GET's to prevent SQL injections and possible XSS attacks
     $liked = $_GET['liked'];
     $id_match = $_GET['id_match'];
     $id_player = $_GET['id_player'];

     $query = mysqli_query($connection, "INSERT INTO feedback(id_feedback, liked, id_player, id_match) VALUES(null, '{$liked}', '{$id_player}', '{$id_match}')");

     if(!$query){

       echo 'There was a problem saving your feedback. Please try again later.';
   		 die("QUERY FAILED" . mysqli_error($connection));

   	}else{

       echo 'Congrats!';

    }

}else{
}

mysqli_close($connection);
?>