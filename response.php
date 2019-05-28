
<?php
require('conf.php');
$data = $_GET['datavalue'];

$datetime = array();

$kaskk=$yhendus->prepare("SELECT id,aeg FROM reserveerimine_aeg");
$kaskk->bind_result($idd,$teine_aeg);
$kaskk->execute();
while($kaskk->fetch()){
  array_push($datetime,$teine_aeg);
}



$kask=$yhendus->prepare("SELECT id,kuupaev,aeg FROM reserveerimine");
$kask->bind_result($id, $kuupaev,$aeg);
$kask->execute();
echo '<option value="0" disabled selected>Valige Aeg</option>';
while($kask->fetch()){
  foreach ($datetime as $time) {
    if($data == $kuupaev){

        if($aeg == $time){

        }
        else{
          echo '<option value='.$time.'>'.$time.'</option>';
        }
    }
    else{
      echo '<option value='.$time.'>'.$time.'</option>';
    }
  }
}

?>
