<?php
header('Access-Control-Allow-Origin: *');

include('bdConfig.php');

$connection = new mysqli($servername, $username, $password, $database);

$query = mysqli_query( $connection, 
    "SELECT id_match, matches.id_player, players.name, sum(score) as soma, count(id_match)as qtd FROM `matches` 
    inner join players on matches.id_player = players.id_player
    Where score > 0
    group by players.id_player
    order by soma DESC, players.name"
);

$player_id = $_GET['id_player'];
$player_score;
$player_matches;
$player_pos;
$i = 0;
$name = '';
$score = '';
$qtd_partida = '';
$final = '';
// echo '<pre>';
while ($rows = mysqli_fetch_array($query)) {
    $i++;

    $name .= substr($rows['name'], 0, 17);
    $name .= "\n";

    $score .= substr($rows['soma'], 0, 4);
    $score .= "\n";

    $qtd_partida .= substr($rows['qtd'], 0, 2);
    $qtd_partida .= "\n";

    if($player_id == $rows['id_player']){
        $player_score = substr($rows['soma'], 0, 4);
        $player_matches = substr($rows['qtd'], 0, 2);
        $player_pos = $i;
    }

    // print_r($rows);
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


$query2 = mysqli_query( $connection, 
    "SELECT  score, date  FROM `matches` WHERE id_player='{$player_id}' and score!=0 order by score desc, id_match desc"
);

$player_data;
$player_scoreByMatch;
$player_nMatches;
$teste;
// echo '<pre>';
while ($rows = mysqli_fetch_array($query2)) {
    // $player_data .= substr($rows[''], 10);
    // $player_data .= date_format($rows['date'], 'd-m-y');
    
    // $player_data .= $rows['date'];
    
    // $teste = date_create($rows['date']);
    // $date = date('d/m/Y', strtotime($rows['date']));
    $date = substr($rows['date'], 0, 10);
    $player_data .= $date;
    $player_data .= "\n";

    $player_scoreByMatch .= substr($rows['score'], 0, 4);
    $player_scoreByMatch .= "\n";
    
    $player_nMatches .= 1;
    $player_nMatches .= "\n";
    
    // print_r($rows);
    
    // $date = date('d/m/Y', strtotime($rows['date']));
    // print_r($date);
    
    // print_r($rows);
}

// $final = $name . "|" . $score . "|" . $qtd_partida . "|" . $player_data . "|" . $player_scoreByMatch . "|" . $player_pos . "|" . $player_score . "|" . $player_matches;
$final = $name . "|" . $score . "|" . $qtd_partida . "|" . $player_score . "|" . $player_matches . "|" . $player_pos . "|" . $player_data . "|" . $player_scoreByMatch . "|" . $player_nMatches;
// echo "\n";
// 
print_r($final);

mysqli_close($connection);
