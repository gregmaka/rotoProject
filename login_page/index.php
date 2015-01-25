<?php ob_start();
  require_once('../model/database.php');
  require_once('../model/user_db.php');
  include '../krumo/class.krumo.php';

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'login_screen';
}
if ($action == 'login_screen') {
  include '../login_page/login.php';
}

if ($action == 'login') {
  $userName = $_POST['username'];
  $pw = $_POST['password'];
  $cred = get_credentials($userName);
  $credPW = $cred[0][2];
  $userId = $cred[0][0];
  set_userID($userID);
   if ($credPW == $pw) {
    header('Location: http://localhost:8888/roto/build_roster_page/');
   }else{
    include '../login_page/login.php';
    $popUpMessage = '<script type="text/javascript">alert("Please enter Valid Credentials");</script>';
    echo $popUpMessage;
   }
 }
?>
