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
if(isset($_GET['email'])){
    $email = $_GET['email'];

    $query = mysqli_query($connection, "SELECT * FROM players WHERE email = '{$email}'");
    while($rows=mysqli_fetch_array($query)){
    
      echo $rows['email'] . ";" . $rows['password'] . ";" . $rows['name'] . ";" . $rows['age'] . ";" . $rows['id_player'];
    
    }
    mysqli_close($connection);
}

//Seleciona dados de cada linha

?>