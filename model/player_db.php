<?php
function get_players_by_position($position) {

    global $db;
    $query = "SELECT * FROM nflplayers WHERE position = '$position' ORDER BY salary DESC";
    $players = $db->query($query);
    $players = $players->fetchAll();
    return $players;
}
function get_ALL_players() {
    global $db;
    $query = "SELECT * FROM nflplayers
              ORDER BY position = 'QB' DESC,
                       position = 'RB' DESC,
                       position = 'WR' DESC,
                       position = 'TE' DESC,
                       position = 'K'  DESC,
                       salary DESC";
    $players = $db->query($query);
    $players = $players->fetchAll();
    return $players;
}
function get_ALL_playersRAND() {
    global $db;
    $query = "SELECT * FROM nflplayers
              ORDER BY RAND()";
    $players = $db->query($query);
    $players = $players->fetchAll();
    return $players;
}
function get_selected_players() {
    global $db;
    $query = "SELECT * FROM user_player ";
    $userPlayers = $db->query($query);
    $userPlayers = $userPlayers->fetchAll();
    return $userPlayers;
}
function get_CPU_players(){
    global $db;
    $query = "SELECT * FROM user_player ";
    $cpuPlayers = $db->query($query);
    $cpuPlayers = $userPlayers->fetchAll();
    return $cpuPlayers;
}
function add_player($userID,$playerID) {
    global $db;
    $query = "INSERT INTO user_player(userID, playerID)VALUES('$userID','$playerID')";
            $db->exec($query);
}
function display_selected($userID){
    global $db;
    $query = "SELECT * FROM nflplayers
              left join user_player on nflplayers.playerID = user_player.playerID
              WHERE user_player.userID = '$userID'
              ORDER BY position = 'QB' DESC,
                       position = 'RB' DESC,
                       position = 'WR' DESC,
                       position = 'TE' DESC,
                       position = 'K'  DESC,
                       salary DESC";
              $userPlayers = $db->query($query);
    return $userPlayers;
}
function remove_player($playerID) {
    global $db;
    $query = "DELETE FROM user_player
              WHERE playerID = '$playerID'";
    $db->exec($query);
}
function clear_team($userID) {
    global $db;
    $query = "DELETE FROM user_player
              WHERE userID = '$userID'";
    $db->exec($query);
}
function get_count($userID,$playerPosition){
    global $db;
    $query = "SELECT  COUNT(position) FROM nflplayers
              left join user_player on nflplayers.playerID = user_player.playerID
              WHERE user_player.userID = '$userID' AND nflplayers.position = '$playerPosition'";
              $count = $db->query($query);
              $count = $count->fetchColumn();
              return $count;
}
function get_total_count($userID){
    global $db;
    $query = "SELECT  COUNT(position) FROM nflplayers
              left join user_player on nflplayers.playerID = user_player.playerID
              WHERE user_player.userID = '$userID'";
              $count = $db->query($query);
              $count = $count->fetchColumn();
              return $count;
}
function get_QBcount(){
    global $db;

    $query = "SELECT COUNT(position) FROM nflplayers
              left join user_player on nflplayers.playerID = user_player.playerID
              WHERE user_player.userID = 1 and position = 'QB'";
              $count = $db->query($query);
              $count = $count->fetchColumn();
              return $count;
}
function get_salary_total($userID){
    global $db;

    $query = "SELECT  sum(salary) FROM nflplayers
              left join user_player on nflplayers.playerID = user_player.playerID
              WHERE user_player.userID = '$userID'";
              $salaryTotal = $db->query($query);
              $salaryTotal = $salaryTotal->fetchColumn();
              return $salaryTotal;

}
function get_form_string($position,$playerName,$playerID){

              $String = "<form action=\".\" method=\"post\">
                          <input type=\"hidden\" name=\"action\" value=\"delete_player\" />
                          <input type=\"hidden\" name=\"position\"   value=\"$position\"/>
                          <input type=\"hidden\" name=\"playerName\" value=\"$playerName\"/>
                          <input type=\"hidden\" name=\"playerID\"   value=\"$playerID\"/>
                          <input type=\"submit\" id=\"remove\" name=\"remove\" value=\"\" />
                          </form>";

              return $String;
}
function formatDollars($dollars){
    if(isset($dollars) && $dollars > 0){
      return "$".number_format(sprintf('%0.2f', preg_replace("/[^0-9.]/", "", $dollars)),2);
    }elseif(isset($dollars) && $dollars < 0){
      return "-". "$".number_format(sprintf('%0.2f', preg_replace("/[^0-9.]/", "", $dollars)),2);
    }
  else
    return NULL;

}

?>




























