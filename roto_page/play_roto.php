<?php include '../view/header.php'; ?>
<div id="mainScreen">
  <?php foreach ($userPlayers as $userPlayer) : ?>
    <?php
          /* $userPlayers consists of user_player data REFERENCES nflplayers DB
             adds selected roster into table cells */

          switch($userPlayer['position']['playerID']){

            case 'Q':
              $qb = $userPlayer['name'];
              $position = $userPlayer['position'];
              $qbSalary = $userPlayer['salary'];
              $playerID = $userPlayer['playerID'];
              break;

            case 'W':
              if(isset($wr)){
                $wr2 = $userPlayer['name'];
                $position = $userPlayer['position'];
                $wr2Salary = $userPlayer['salary'];
                $playerID = $userPlayer['playerID'];
              }else{
                $wr = $userPlayer['name'];
                $position = $userPlayer['position'];
                $wrSalary = $userPlayer['salary'];
                $playerID = $userPlayer['playerID'];
            }
              break;

            case 'R':
              if(!isset($rb)){
                $rb = $userPlayer['name'];
                $position = $userPlayer['position'];
                $rbSalary = $userPlayer['salary'];
                $playerID = $userPlayer['playerID'];
              }else{
                $rb2 = $userPlayer['name'];
                $position = $userPlayer['position'];
                $rb2Salary = $userPlayer['salary'];
                $playerID = $userPlayer['playerID'];
            }
              break;

            case 'K':
              $k = $userPlayer['name'];
              $position = $userPlayer['position'];
              $kSalary = $userPlayer['salary'];
              $playerID = $userPlayer['playerID'];
              break;

            case 'T':
              $te = $userPlayer['name'];
              $position = $userPlayer['position'];
              $teSalary = $userPlayer['salary'];
              $playerID = $userPlayer['playerID'];
              break;
          }
?>
<?php endforeach; ?>
  <table id="rosterTable">
    <tr>
      <td width="15%">QB</td>
      <td width="56%"><?php echo $qb; ?></td>
      <td width="17%"><?php echo $qbScore; ?></td>
    </tr>
    <tr>
      <td>RB</td>
      <td><?php echo $rb; ?></td>
      <td><?php echo $rbScore; ?></td>
    <tr>
      <td>RB</td>
      <td><?php echo $rb2; ?></td>
      <td><?php echo $rb2Score; ?></td>
    </tr>
      <td>WR</td>
      <td><?php echo $wr; ?></td>
      <td><?php echo $wrScore; ?></td>
    </tr>
      <td>WR</td>
      <td><?php echo $wr2; ?></td>
      <td><?php echo $wr2Score; ?></td>
    </tr>
      <td>TE</td>
      <td><?php echo $te; ?></td>
      <td><?php echo $teScore; ?></td>
    </tr>
      <td>K</td>
      <td><?php echo $k?></td>
      <td><?php echo $kScore; ?></td>
    </tr>
    </tr>
      <td></td>
      <td>Player total score : </td>
      <td><?php echo $totalScore; ?></td>
    </tr>
  </table>
    <?php foreach ($cpuPlayers as $cpuPlayer) : ?>
    <?php
          switch($cpuPlayer['position']['playerID']){

            case 'Q':
              $CPUqb = $cpuPlayer['name'];
              $position = $cpuPlayer['position'];
              $qbSalary = $cpuPlayer['salary'];
              $playerID = $cpuPlayer['playerID'];
              break;

            case 'W':
              if(isset($CPUwr)){
                $CPUwr2 = $cpuPlayer['name'];
                $position = $cpuPlayer['position'];
                $wr2Salary = $cpuPlayer['salary'];
                $playerID = $cpuPlayer['playerID'];
              }else{
                $CPUwr = $cpuPlayer['name'];
                $position = $cpuPlayer['position'];
                $wrSalary = $cpuPlayer['salary'];
                $playerID = $cpuPlayer['playerID'];
            }
              break;

            case 'R':
              if(!isset($CPUrb)){
                $CPUrb = $cpuPlayer['name'];
                $position = $cpuPlayer['position'];
                $rbSalary = $cpuPlayer['salary'];
                $playerID = $cpuPlayer['playerID'];
              }else{
                $CPUrb2 = $cpuPlayer['name'];
                $position = $cpuPlayer['position'];
                $rb2Salary = $cpuPlayer['salary'];
                $playerID = $cpuPlayer['playerID'];
            }
              break;

            case 'K':
              $CPUk = $cpuPlayer['name'];
              $position = $cpuPlayer['position'];
              $kSalary = $cpuPlayer['salary'];
              $playerID = $cpuPlayer['playerID'];
              break;

            case 'T':
              $CPUte = $cpuPlayer['name'];
              $position = $cpuPlayer['position'];
              $teSalary = $cpuPlayer['salary'];
              $playerID = $cpuPlayer['playerID'];
              break;
          }
    ?>
                <?php endforeach; ?>
  <table id="rosterTable2">
    <tr>
      <td width="15%">QB</td>
      <td width="56%"><?php echo $CPUqb; ?></td>
      <td width="17%"><?php echo $CPUqbScore; ?></td>
    </tr>
    <tr>
      <td>RB</td>
      <td><?php echo $CPUrb; ?></td>
      <td><?php echo $CPUrbScore; ?></td>
    <tr>
      <td>RB</td>
      <td><?php echo $CPUrb2; ?></td>
      <td><?php echo $CPUrb2Score; ?></td>
    </tr>
      <td>WR</td>
      <td><?php echo $CPUwr; ?></td>
      <td><?php echo $CPUwrScore; ?></td>
    </tr>
      <td>WR</td>
      <td><?php echo $CPUwr2; ?></td>
      <td><?php echo $CPUwr2Score; ?></td>
    </tr>
      <td>TE</td>
      <td><?php echo $CPUte; ?></td>
      <td><?php echo $CPUteScore; ?></td>
    </tr>
      <td>K</td>
      <td><?php echo $CPUk; ?></td>
      <td><?php echo $CPUkScore; ?></td>
    </tr>
    </tr>
      <td></td>
      <td>CPU total score : </td>
      <td><?php echo $CPUtotalScore; ?></td>
    </tr>
  </table>
  <div id="getScores">
    <form action="." method="post">
     <input type="hidden" name="action" value="get_Scores" />
     <input type="submit" id="get_Scores" name="get_Scores" value=""/>
    </form>
    <script>
         function myFunction() {
         document.getElementById("getScores").innerHTML = "Paragraph changed.";
         }
    </script>
  </div>
</div>
<?php include '../view/footer.php'; ?>

