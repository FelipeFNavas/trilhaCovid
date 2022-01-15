<?php
header('Access-Control-Allow-Origin: *');

include('bdConfig.php');

$connection = new mysqli($servername, $username, $password, $database);

$query = mysqli_query( $connection, 
    "SELECT id_match, players.name, sum(score) as soma, count(id_match)as qtd FROM `matches` 
    inner join players on matches.id_player = players.id_player
    Where score > 0
    group by players.id_player
    order by soma DESC, players.name"
);

$name = '';
$score = '';
$qtd_partida = '';
$final = '';
while ($rows = mysqli_fetch_array($query)) {

    $name .= substr($rows['name'], 0, 15);
    $name .= "\n";

    $score .= substr($rows['soma'], 0, 4);
    $score .= "\n";

    $qtd_partida .= substr($rows['qtd'], 0, 2);
    $qtd_partida .= "\n";
    // if (strlen($name) < 10) {
    //     $diff = 10 - strlen($name);
    //     $name .= str_repeat(" ", $diff);
    // }
    // $score = substr($rows['soma'], 0, 4);
    // if (strlen($score) < 4) {
    //     $diff = 4 - strlen($score);
    //     $score = str_repeat("0", $diff) . $score;
    // }
    // $qtd_partida = substr($rows['qtd'], 0, 2);
    // if (strlen($qtd_partida) < 2) {
    //     $diff = 2 - strlen($qtd_partida);
    //     $qtd_partida = str_repeat("0", $diff) . $qtd_partida;
    // }
    // $final .= "$name        $score     $qtd_partida\n";

    // $final .= "$name\n";

}
$final = $name . "|" . $score . "|" . $qtd_partida;

echo '<pre>';
echo "\n";
print_r($final);

mysqli_close($connection);
