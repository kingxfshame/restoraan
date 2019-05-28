<?php
$yhendus=new mysqli("localhost", "root", "", "restoraan");
function andmed(){
    global $yhendus;
    require('conf.php');
    $kask=$yhendus->prepare("SELECT * FROM menuu");
    $kask->bind_result($id, $nimi, $maksab, $sisaldus, $kategooria, $pilt);
    $kask->execute();
    $hoidla=array();
    while($kask->fetch()){
        $kaup=new stdClass();
        $kaup->id=$id;
        $kaup->nimi=htmlspecialchars($nimi);
        $kaup->maksab=htmlspecialchars($maksab);
        $kaup->sisaldus=htmlspecialchars($sisaldus);
        $kaup->kategooria=htmlspecialchars($kategooria);
        $kaup->pilt=htmlspecialchars($pilt);
        array_push($hoidla, $kaup);
    }
    return $hoidla;
}
function lisa_menuu($nimi, $maksab, $sisaldus, $kategooria, $file_name){
    global $yhendus;
    $kask=$yhendus->prepare("INSERT INTO menuu (nimi, maksab, sisaldus, kategooria, pilt)  VALUES (?,?,?,?,?)");
    $kask->bind_param("sisss", $nimi, $maksab, $sisaldus, $kategooria, $file_name);
    $kask->execute();
}

function kustutaKaup($id){
     global $yhendus;
     $kask=$yhendus->prepare("DELETE FROM menuu WHERE id=?");
     $kask->bind_param("i", $id);
     $kask->execute();
  }

function muudaKaup($id, $nimi, $maksab, $sisaldus, $kategooria, $pilt){
    global $yhendus;
    $kask=$yhendus->prepare("UPDATE menuu SET nimi=?, maksab=?, sisaldus=?, kategooria=?, pilt=? WHERE id=?");
    $kask->bind_param("isisss", $id, $nimi, $maksab, $sisaldus, $kategooria, $pilt);
    $kask->execute();
}
?>
<?php
  function andmed2(){
    global $yhendus;
    require('conf.php');
    $kask=$yhendus->prepare("SELECT * FROM reserveerimine");
    $kask->bind_result($id, $eesnimi, $epost, $telefon, $kuupaev, $aeg, $inimesed);
    $kask->execute();
    $hoidla=array();
    while($kask->fetch()){
        $kaup2=new stdClass();
        $kaup2->id=$id;
        $kaup2->eesnimi=htmlspecialchars($eesnimi);
        $kaup2->epost=htmlspecialchars($epost);
        $kaup2->telefon=htmlspecialchars($telefon);
        $kaup2->kuupaev=htmlspecialchars($kuupaev);
        $kaup2->aeg=htmlspecialchars($aeg);
        $kaup2->inimesed=htmlspecialchars($inimesed);
        array_push($hoidla, $kaup2);
    }
    return $hoidla;
}

function kustuta_reserverimine($id){
     global $yhendus;
     $kask=$yhendus->prepare("DELETE FROM reserveerimine WHERE id=?");
     $kask->bind_param("i", $id);
     $kask->execute();
  }

function muuda_reserverimine($id, $eesnimi, $epost, $telefon, $kuupaev, $aeg, $inimesed){
    global $yhendus;
    $kask=$yhendus->prepare("UPDATE reserveerimine SET eesnimi=?, epost=?, telefon=?, kuupaev=?, aeg=?, inimesed=? WHERE id=?");
    $kask->bind_param("issssss", $id, $eesnimi, $epost, $telefon, $kuupaev, $aeg, $inimesed);
    $kask->execute();
}
?>
