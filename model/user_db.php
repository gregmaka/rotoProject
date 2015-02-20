<?php //db connect


function get_credentials($username) {
    global $db;
    $query = "SELECT * FROM user
              WHERE userName = '$username'";
    $credentials = $db->query($query);
    $credentials = $credentials->fetchAll();
    return $credentials;
  }
function set_userID($id){
  return $userID = $id;
}
?>
