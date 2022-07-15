<?php

header('Content-Type: text/json');
include("config.php");
echo "inizio actions.php";
$action = $_POST['action'];
echo($action);
$query_string = "";

if ($action == "insert") {
  echo($action);
  insertName();
}

function insertName()
{
  echo($_POST['text']);
  if (isset($_POST['text'])) {
    $player = $_POST['text'];
    echo "you didn't specify a name";
  } else {
    echo "you didn't specify a name";
    return;
  }

  $mysqli = new mysqli(DB_HOST,DB_USER, DB_PASSWORD,DB_DATABASE);
  $query_string = 'INSERT INTO  players(nickname, game , points) VALUES ("' .$player .'","0","0")';
  $result=$mysqli->query($query_string);

  $query_string = 'SELECT * FROM players WHERE id="' . $mysqli->insert_id .'"';
  
  // Hardening
  $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

  $result=$mysqli->query($query_string);

  $names = array();


  while ($row = $result->fetch_array(MYSQLI_ASSOC)) {

    $player_id = $row['id'];
    $player_text = $row['text'];
    $player_game = $row['game'];
    $player_points = $row['points'];

    $name = array('id' => $player_id, 'text' => $player_text, 'completed' => $player_game, 'date' => $player_points);
    array_push($names, $name);
  }

  $response = array('names' => $names, 'type' => 'insert');

  echo json_encode($response);

}

?>
