<?php
require('funktsiionid.php');
if(isSet($_REQUEST["kaubalisamine"])){
  if(isset($_FILES['image'])){
     $errors= array();
     $file_name = $_FILES['image']['name'];
     $file_size =$_FILES['image']['size'];
     $file_tmp =$_FILES['image']['tmp_name'];
     $file_type=$_FILES['image']['type'];
     $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));

     $expensions= array("jpg");

     if(in_array($file_ext,$expensions)=== false){
        $errors[]="extension not allowed, please choose a JPEG or PNG file.";
     }

     if($file_size > 2097152){
        $errors[]='File size must be excately 2 MB';
     }

     if(empty($errors)==true){
        move_uploaded_file($file_tmp,"images/restoraan/".$file_name);
        lisa_menuu($_REQUEST["nimi"], $_REQUEST["maksab"], $_REQUEST["sisaldus"], $_REQUEST["kategooria"], $file_name);
        header("Location: admin.php");
        exit();
     }else{
        print_r($errors);
     }
  }
}
if(isSet($_REQUEST["kustutusid"])){
    kustutaKaup($_REQUEST["kustutusid"]);
}
if(isSet($_REQUEST["muutmine"])){
    muudaKaup($_REQUEST["muudetudid"], $_REQUEST["nimi"], $_REQUEST["maksab"], $_REQUEST["sisaldus"], $_REQUEST["kategooria"], $_REQUEST["pilt"]);
}
$andmed=andmed();

if(isSet($_REQUEST["kustutusid_reserverimine"])){
    kustuta_reserverimine($_REQUEST["kustutusid_reserverimine"]);
}

if(isSet($_REQUEST["muutmine_reserverimine"])){
    muuda_reserverimine($_REQUEST["muutmine_reser"], $_REQUEST["eesnimi"], $_REQUEST["epost"], $_REQUEST["telefon"], $_REQUEST["kuupaev"], $_REQUEST["aeg"], $_REQUEST["inimesed"]);
}
$andmed2=andmed2();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="et">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>Administraatorileht</title>

    <meta charset="utf-8">
    <style>
        td {
            text-align: center;
        }
    </style>
    <script>
        $(document).ready(function() {
            $("#resirverimine").click(function() {
                $("#reserverimine_tabel").slideToggle("slow");
            });
        });
        $(document).ready(function() {
            $("#menuu").click(function() {
                $("#menuu_tabel").slideToggle("slow");
            });
        });
    </script>
    <link rel="stylesheet" type="text/css" href="admin_style.css">
</head>
<body>
<table border="1" width="200px" height="100px">
    <tr>
        <td>
            <div id="menuu">
                Menuu
            </div>
        </td>
    </tr>
<tr>
    <td>
        <div id="resirverimine">
            Resirveerimine
        </div>
    </td>
</tr>
</table>
<br>
<br>
<div id="menuu_tabel">
    <table border="1" width="200px" height="100px" method="POST" enctype="multipart/form-data">
        <form action="admin.php" method="POST" enctype="multipart/form-data">
            <h2>Toode lisamine</h2>
            <dl>
                <dt>Nimetus:</dt>
                <dd><input type="text"  name="nimi" /></dd>
                <dt>Hind:</dt>
                <dd><input type="text" name="maksab"></dd>
                <dt>Koostisosad:</dt>
                <dd><input type="text" name="sisaldus" /></dd>
                <dt>Kategooria:</dt>
                <dd><input type="text" name="kategooria" /></dd>
                <dt>Pilt:</dt>
                <dd><input type="file" name="image" /></dd>
            </dl>
            <input type="submit" name="kaubalisamine" value="Lisa toode" />
            <br><br>
        </form>
        <div id="text2">
            Menüü tabel
        </div>
        <tr>
            <td></td>
            <td>Nimetus</td>
            <td>Hind</td>
            <td>Koostisosad</td>
            <td>Kategooria</td>
            <td>Pilt</td>
        </tr>

        <?php foreach($andmed as $kaup): ?>
            <tr>
                <?php if(isSet($_REQUEST["muutmisid"]) &&
                    intval($_REQUEST["muutmisid"])==$kaup->id): ?>
                    <td>
                        <a href="admin.php?muutmine=<?=$kaup->id ?>">Muuta</a>
                        <input type="submit" name="muutmine" value="Muuda" />
                        <input type="submit" name="katkestus" value="Katkesta" />
                        <input type="hidden" name="muudetudid" value="<?=$kaup->id ?>" />
                    </td>
                    <td><input type="text" name="nimi" value="<?=$kaup->nimi ?>" /></td>
                    <td><input type="text" name="maksab" value="<?=$kaup->maksab ?>" /></td>
                    <td><input type="text" name="sisaldus" value="<?=$kaup->sisaldus ?>" /></td>
                    <td><input type="text" name="kategooria" value="<?=$kaup->kategooria ?>" /></td>
                    <td><input type="text" name="pilt" value="<?=$kaup->pilt ?>" /></td>
                <?php else: ?>
                    <td><a href="admin.php?kustutusid=<?=$kaup->id ?>"
                           onclick="return confirm('Kas ikka soovid kustutada?')">Kustuta</a>
                        <a href="admin.php?muutmisid=<?=$kaup->id ?>">Muuda</a>
                    </td>
                    <td><?=$kaup->nimi ?></td>
                    <td><?=$kaup->maksab ?></td>
                    <td><?=$kaup->sisaldus ?></td>
                    <td><?=$kaup->kategooria ?></td>
                    <td><?=$kaup->pilt ?></td>
                <?php endif
                ?>
            </tr>
        <?php endforeach;
        ?>
    </table>
</div>




  <div id="reserverimine_tabel">
    <table border="1" width="500px" height="100px">
        <div id="text2">
            Reserveerimine tabel
        </div>
        <tr>
            <td></td>
            <td>Nimi</td>
            <td>Epost</td>
            <td>Telefon</td>
            <td>Kuupäev</td>
            <td>Aeg</td>
            <td>Inimesed</td>
        </tr>

        <?php foreach($andmed2 as $kaup2): ?>
            <tr>
                <?php if(isSet($_REQUEST["muutmisid_reserverimine"]) && intval($_REQUEST["muutmisid_reserverimine"])==$kaup2->id): ?>
                    <td>
                        <a href="admin.php?muutmine_reserverimine=<?=$kaup2->id ?>">Muuta</a>
                        <input type="submit" name="muutmine_reserverimine" value="Muuda" />
                        <input type="submit" name="katkestus_reserverimine" value="Katkesta" />
                        <input type="hidden" name="muutmine_reser" value="<?=$kaup2->id ?>" />
                    </td>
                    <td><input type="text" name="eesnimi" value="<?=$kaup2->eesnimi ?>" /></td>
                    <td><input type="text" name="epost" value="<?=$kaup2->epost ?>" /></td>
                    <td><input type="text" name="telefon" value="<?=$kaup2->telefon ?>" /></td>
                    <td><input type="text" name="kuupaev" value="<?=$kaup2->kuupaev ?>" /></td>
                    <td><input type="text" name="aeg" value="<?=$kaup2->aeg ?>" /></td>
                    <td><input type="text" name="inimesed" value="<?=$kaup2->inimesed ?>" /></td>
                <?php else: ?>
                    <td><a href="admin.php?kustutusid_reserverimine=<?=$kaup2->id ?>" onclick="return confirm('Kas ikka soovid kustutada?')">Kustuta</a>
                        <a href="admin.php?muutmisid_reserverimine=<?=$kaup2->id ?>">Muuda</a>
                    </td>
                    <td><?=$kaup2->eesnimi ?></td>
                    <td><?=$kaup2->epost ?></td>
                    <td><?=$kaup2->telefon ?></td>
                    <td><?=$kaup2->kuupaev ?></td>
                    <td><?=$kaup2->aeg ?></td>
                    <td><?=$kaup2->inimesed ?></td>
                <?php endif
                ?>
            </tr>
        <?php endforeach;
        ?>
    </table>
</div>
</body>
</html>
