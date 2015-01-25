<?php ob_start();
      require '../model/player_db.php';
      require '../model/database.php';
      require 'score_functions.php';
      include '../krumo/class.krumo.php';

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'showROSTER';
}
if($action == 'showROSTER'){
    $userID = 1;
    $cpuID = 0;
    $userPlayers = display_selected($userID);
    $cpuPlayers = display_selected($cpuID);
    draft_CPU_team();
    include('play_roto.php');
  }
if($action == 'get_Scores') {
   $userID = 1;
   $cpuID = 0;
   $userPlayers = display_selected($userID);
   $cpuPlayers = display_selected($cpuID);
   $qbScore = get_score('QB');
   $wrScore = get_score('WR');
   $wr2Score = get_score('WR');
   $rbScore = get_score('RB');
   $rb2Score = get_score('RB');
   $teScore = get_score('TE');
   $kScore = get_score('K');
   $totalScore = $qbScore + $wrScore + $wr2Score + $rbScore + $rb2Score + $teScore + $kScore;

   $CPUqbScore = get_score('QB');
   $CPUwrScore = get_score('WR');
   $CPUwr2Score = get_score('WR');
   $CPUrbScore = get_score('RB');
   $CPUrb2Score = get_score('RB');
   $CPUteScore = get_score('TE');
   $CPUkScore = get_score('K');
   $CPUtotalScore = $CPUqbScore + $CPUwrScore + $CPUwr2Score + $CPUrbScore + $CPUrb2Score + $CPUteScore + $CPUkScore;
   if ($CPUtotalScore > $totalScore) {
             $resultMessage = "You Lose!";
       }else{
            $resultMessage = "Winner!";
         }
   clear_team($cpuID);
   include('results.php');
}
if ($action == 'play_again') {
    $userID = 1;
    clear_team($userID);
    $players = get_ALL_players();
    $userPlayers = display_selected($userID);
    $salaryTotal = get_salary_total($userID);
    include('../build_roster_page/player_list.php');
}
?>
