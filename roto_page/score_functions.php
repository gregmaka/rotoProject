<?php
function get_score($position){
  if($position == 'QB'){
    $passYards = mt_rand(100,400);
    $rushYards = mt_rand(-10,100);
    $rushTDs = mt_rand(0,1);
    $passTDs = mt_rand(0,4);
    $interception = mt_rand(-2,0);
    $fumble = mt_rand(-1,0);
    $turnover = $interception + $fumble;
    $score = ($passYards/25) + ($rushYards/10) + ($rushTDs*6) + ($passTDs*4) + ($turnover*2);
  }elseif ($position == 'RB' || $position == 'WR' || $position == 'TE') {
    $yards = mt_rand(0,150);
    $tds = mt_rand(0,3);
    $turnover = mt_rand(-1,0);
    $score = ($yards/10) + ($tds*6) + ($turnover*2);
  }elseif ($position == 'K') {
    $longKick = mt_rand(0,1);
    $medKick = mt_rand(0,1);
    $shortKick = mt_rand(0,3);
    $extraPoint = mt_rand(0,5);
    $missedKick = mt_rand(-1,0);
    $score = ($longKick*5) + ($medKick*4) + ($shortKick*3) +($missedKick*2) + $extraPoint;
  }
  return $score;
}
function draft_CPU_team(){
  $players = get_ALL_playersRAND();
  foreach ($players as $player) {
    $cpuID = 0;
    $position = $player['position'];
    $count = get_count($cpuID,$position);
    $playerID = $player['playerID'];
    if((($position == 'QB' || $position == 'TE' || $position == 'K') && $count < 1) || (($position == 'WR' || $position == 'RB') && $count < 2)) {
      add_player($cpuID,$playerID);
    }
  }
}
?>
