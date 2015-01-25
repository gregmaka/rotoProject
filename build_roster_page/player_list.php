<?php include '../view/header.php'; ?>

<div id="mainScreen">
  <div id="leftHead">
    <table>
      <tr>
        <td><form action="" method="post">
              <input type="hidden" name="action" value="showALL" />
              <input type="submit" id="posList" name="posList" value="ALL" />
            </form></td>
        <td><form action="." method="post">
              <input type="hidden" name="action" value="showPosition" />
              <input type="hidden" name="position" value="QB" />
              <input type="submit" id="posList" name="posList" value="QB" />
            </form></td>
        <td><form action="." method="post">
              <input type="hidden" name="action" value="showPosition" />
              <input type="hidden" name="position" value="RB" />
              <input type="submit" id="posList" name="posList" value="RB" />
            </form></td>
        <td><form action="." method="post">
              <input type="hidden" name="action" value="showPosition" />
              <input type="hidden" name="position" value="WR" />
              <input type="submit" id="posList" name="posList" value="WR" />
            </form></td>
        <td><form action="." method="post">
              <input type="hidden" name="action" value="showPosition" />
              <input type="hidden" name="position" value="TE" />
              <input type="submit" id="posList" name="posList" value="TE" />
            </form></td>
        <td><form action="." method="post">
              <input type="hidden" name="action" value="showPosition" />
              <input type="hidden" name="position" value="K" />
              <input type="submit" id="posList" name="posList" value="K" />
            </form></td>
      </tr>
    </table>
  </div>
<div class="availablePlayers">
  <table id="playerTable">
              <?php foreach ($players as $player) : ?>
    <tr>
       <td width="10%" id="pos"><?php echo $player['position']; ?></td>
       <td width="60%" id="name"><?php echo $player['name']; ?></td>
       <td width="20%" id="salary"><?php echo "$".$player['salary']; ?></td>
       <td width="10%" >
          <form action="." method="post">
            <input type="hidden" name="action" value="add_player" />
            <input type="hidden" name="position"   value="<?php echo $player['position']; ?>"/>
            <input type="hidden" name="playerName" value="<?php echo $player['name']; ?>"/>
            <input type="hidden" name="playerID"   value="<?php echo $player['playerID']; ?>"/>
            <input type="submit" id="submit" name="submit" value="" />
          </form></td>
    </tr>
<?php endforeach; ?>
  </table>
</div>
<div id="rightHead">
  <div id="messages">
    <p><?php echo $errorMessage; ?> </p>
  </div>
  </div>
  <div class="selectedPlayers">
  <table id="playerFormat">
    <?php $qbP= "Select Quarterback";
          $wrP = "Select Wide Reciever";
          $rbP= "Select Running Back";
          $wr2P = "Select Wide Reciever";
          $rb2P= "Select Running Back";
          $kP = "Select Kicker";
          $teP = "Select Tight End";
          $salaryCap = "60000";
          $capRoom = $salaryCap - $salaryTotal;

    ?>
    <?php foreach ($userPlayers as $userPlayer) : ?>
    <?php
          /* $userPlayers consists of user_player data REFERENCES nflplayers DB
             when user selects player from available players, switch adds
             into apporopriate table cell*/

          switch($userPlayer['position']['playerID']){

            case 'Q':
              $qb = $userPlayer['name'];
              $position = $userPlayer['position'];
              $qbSalary = $userPlayer['salary'];
              $playerID = $userPlayer['playerID'];
              $qbP = null;
              $qbString = get_form_string($position,$qb,$playerID);
              break;

            case 'W':
              if(isset($wr)){
                $wr2 = $userPlayer['name'];
                $position = $userPlayer['position'];
                $wr2Salary = $userPlayer['salary'];
                $playerID = $userPlayer['playerID'];
                $wr2P = NULL;
                $wr2String = get_form_string($position,$wr2,$playerID);
              }else{
                $wr = $userPlayer['name'];
                $position = $userPlayer['position'];
                $wrSalary = $userPlayer['salary'];
                $playerID = $userPlayer['playerID'];
                $wrP = NULL;
                $wrString = get_form_string($position,$wr,$playerID);
            }
              break;

            case 'R':
              if(!isset($rb)){
                $rb = $userPlayer['name'];
                $position = $userPlayer['position'];
                $rbSalary = $userPlayer['salary'];
                $playerID = $userPlayer['playerID'];
                $rbP = NULL;
                $rbString = get_form_string($position,$rb,$playerID);
              }else{
                $rb2 = $userPlayer['name'];
                $position = $userPlayer['position'];
                $rb2Salary = $userPlayer['salary'];
                $playerID = $userPlayer['playerID'];
                $rb2P = NULL;
                $rb2String = get_form_string($position,$rb2,$playerID);
            }
              break;

            case 'K':
              $k = $userPlayer['name'];
              $position = $userPlayer['position'];
              $kSalary = $userPlayer['salary'];
              $playerID = $userPlayer['playerID'];
              $kP = NULL;
              $kString = get_form_string($position,$k,$playerID);
              break;

            case 'T':
              $te = $userPlayer['name'];
              $position = $userPlayer['position'];
              $teSalary = $userPlayer['salary'];
              $playerID = $userPlayer['playerID'];
              $teP = NULL;
              $teString = get_form_string($position,$te,$playerID);
              break;
          }
    ?>
    <?php endforeach; ?>
  <table id="rosterTable0">
    <tr>
      <td width="15%">QB</td>
      <td width="56%"><?php echo $qb,$qbP; ?></td>
      <td width="21%"><?php echo formatDollars($qbSalary); ?></td>
      <td width="17%"><?php echo $qbString; ?></td>
    </tr>
    <tr>
      <td>RB</td>
      <td><?php echo $rb,$rbP; ?></td>
      <td><?php echo formatDollars($rbSalary); ?></td>
      <td><?php echo $rbString; ?></td>
    <tr>
      <td>RB</td>
      <td><?php echo $rb2,$rb2P; ?></td>
      <td><?php echo formatDollars($rb2Salary); ?></td>
      <td><?php echo $rb2String; ?></td>
    </tr>
      <td>WR</td>
      <td><?php echo $wr,$wrP; ?></td>
      <td><?php echo formatDollars($wrSalary); ?></td>
      <td><?php echo $wrString; ?></td>
    </tr>
      <td>WR</td>
      <td><?php echo $wr2,$wr2P; ?></td>
      <td><?php echo formatDollars($wr2Salary); ?></td>
      <td><?php echo $wr2String; ?></td>
    </tr>
      <td>TE</td>
      <td><?php echo $te,$teP; ?></td>
      <td><?php echo formatDollars($teSalary); ?></td>
      <td><?php echo $teString; ?></td>
    </tr>
      <td>K</td>
      <td><?php echo $k,$kP ?></td>
      <td><?php echo formatDollars($kSalary); ?></td>
      <td><?php echo $kString; ?></td>
    </tr>
  </table>
  <table>
    <tr>
      <td>Salary Cap</td>
      <td><?php echo formatDollars($salaryCap); ?></td>
    </tr>
    <tr>
      <td> Roster Total </td>
      <td><?php echo formatDollars($salaryTotal); ?></td>
    </tr>
      <td> Amount left</td>
      <td><?php echo formatDollars($capRoom); ?></td>
    </tr>
  </table>
  <div>
   <form action="." method="post">
    <input type="hidden" name="action" value="go_roto" />
    <input type="hidden" name="salaryCap" value="<?php echo $salaryCap; ?>"/>
    <input type="hidden" name="playerID"   value="<?php echo $player['playerID']; ?>"/>
    <input type="submit" id="goRoto" name="goRoto" value="" />
   </form>
  </div>
 </div>
</div><?php include '../view/footer.php'; ?>
