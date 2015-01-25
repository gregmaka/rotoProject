<?php ob_start();
      require '../model/player_db.php';
      require '../model/database.php';
      include '../krumo/class.krumo.php';
      include '../roto_page/score_functions.php';
//krumo($_POST);

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'showALL';
}

/* Lists available players by position when clicked */

if ($action == 'showALL'){

    krumo($_POST);
    $userID = 1;
    $players = get_ALL_players();
    $userPlayers = display_selected($userID);
    krumo($userPlayers);
    $salaryTotal = get_salary_total($userID);
    include('player_list.php');

  }elseif ($action == 'showPosition') {
    $userID = 1;
    krumo($_POST);
    $players = get_players_by_position($_POST['position']);
    $userPlayers = display_selected($userID);
    $salaryTotal = get_salary_total($userID);
    krumo($_POST);
    include('player_list.php');
  }

  /* Gets position,
     checks to see how many players with that position already selected,
     then adds player userID and playerID to user_player DB */

if($action == 'add_player'){
   $position = $_POST['position'];
   $userID = "1";
   $count = get_count($userID,$position);
   if((($position == 'QB' || $position == 'TE' || $position == 'K') && $count < 1) ||
      (($position == 'WR' || $position == 'RB') && $count < 2)) {
        $playerID = $_POST['playerID'];
        add_player($userID,$playerID);
        $salaryTotal = get_salary_total($userID);
        $players = get_players_by_position($position);
        $userPlayers = display_selected($userID);
        include('player_list.php');
      }else{
        $errorMessage = "Too many $position's on roster!";
        $salaryTotal = get_salary_total($userID);
        $players = get_players_by_position($position);
        $userPlayers = display_selected($userID);
        include('player_list.php');
        }

}elseif ($action == 'delete_player'){      //if delete x is clicked
         $playerID = $_POST['playerID'];
         $position = $_POST['position'];
         //krumo($_POST);
         remove_player($playerID);
         $userID = 1;
         $players = get_players_by_position($position);
         $userPlayers = display_selected($userID);
         $salaryTotal = get_salary_total($userID);
         include('player_list.php');

}elseif ($action == 'go_roto') {
         $userID = 1;
         $cap = $_POST['salaryCap'];
         $playerCount = get_total_count($userID);
         $salaryTotal = get_salary_total($userID);
         draft_CPU_team();

     if ($playerCount == 7 && $salaryTotal <= $cap) {
         header('Location: http://localhost:8888/roto/roto_page/');
         }
     else{
        if($playerCount < 7) {
            $popUpMessage = '<script type="text/javascript">alert("Select a full roster!");</script>';
        }elseif($salaryTotal > $cap) {
            $popUpMessage = '<script type="text/javascript">alert("Stay under salary cap!");</script>';
        }
        $userID = 1;
        $players = get_ALL_players();
        $userPlayers = display_selected($userID);
        $salaryTotal = get_salary_total($userID);
        include('player_list.php');
        echo $popUpMessage;
        }
}
?>
