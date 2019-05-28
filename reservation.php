<?php
require ('conf.php');
$nimi_proverka  = "form-control";
$email_proverka  = "form-control";
$telefon_proverka  = "form-control";
$den_proverka = "form-control";
$aeg_proverka = "form-control";

$nimi_text = "";
$email_text ="" ;
$telefon_text = "";
$den_text = "";
$aeg_text = "";
$proverka_na_den  = 0;
$test = 0;
if(isSet($_REQUEST["uusrida"])) {
$phone = $_REQUEST["telefon"];

function validate_phone_number($phone)
{
     // Allow +, - and . in phone number
     $filtered_phone_number = filter_var($phone, FILTER_SANITIZE_NUMBER_INT);
     // Remove "-" from number
     $phone_to_check = str_replace("-", "", $filtered_phone_number);
     // Check the lenght of number
     // This can be customized if you want phone number from a specific country
     if (strlen($phone_to_check) < 10 || strlen($phone_to_check) > 14) {
        return false;
     } else {
       return true;
     }
}

      if( !isset($_REQUEST["nimi"][0]) ){
        $nimi_proverka = "form-control is-invalid";
        $nimi_text ="" ;
      }
      else{
        $nimi_proverka = "form-control is-valid";
        $nimi_text = $_REQUEST["nimi"];
      }

    if( !isset($_REQUEST["epost"][0]) ){
      $email_proverka = "form-control is-invalid";
      $email_text ="" ;
    }
    else{
      $email_proverka = "form-control is-valid";
      $email_text = $_REQUEST["epost"];
    }


    if( !isset($_REQUEST["telefon"][0]) ){
      $telefon_proverka = "form-control is-invalid";
      $telefon_text = "";
    }
    else{
      if(validate_phone_number($phone) == true){
      $telefon_proverka = "form-control is-valid";
      $telefon_text = $_REQUEST["telefon"];
    }
    else{
      $telefon_proverka = "form-control is-invalid";
      $telefon_text = "";
    }
    }


    if(!isset($_REQUEST["aeg"][0])){
      $aeg_proverka = "form-control is-invalid";
      $aeg_text = "";
    }
    else{
      $aeg_proverka = "form-control is-valid";
      $aeg_text = $_REQUEST["aeg"];
    }


    if( !isset($_REQUEST["kuupaev"][0]) ){
      $den_proverka = "form-control is-invalid";
      $den_text = "";
    }
    else{
      $den_proverka = "form-control is-valid";
      $den_text = $_REQUEST["kuupaev"];
        }
    if(!isset($_REQUEST["nimi"][0]) || !isset($_REQUEST["epost"][0]) || !isset($_REQUEST["nimi"][0]) || !isset($_REQUEST["telefon"][0]) || !isset($_REQUEST["aeg"][0]) || !isset($_REQUEST["kuupaev"][0])){

    }
    else{
          $kask = $yhendus->prepare("INSERT INTO reserveerimine(nimi,epost,telefon,kuupaev,aeg,inimesed)
          VALUES (?,?,?,?,?,?)");
          $kask->bind_param("ssssss", $_REQUEST["nimi"], $_REQUEST["epost"], $_REQUEST["telefon"],$_REQUEST["kuupaev"], $_REQUEST["aeg"], $_REQUEST["inimesed"]);
          $kask->execute();
          $test = 1;
          header("Location: $_SERVER[PHP_SELF]");
          $yhendus->close();
}
}


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Osihiteo - Reserveerimine</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lovers+Quarrel" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">


    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>

	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light ftco-navbar-light-2" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.php">Osihiteo</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	        	<li class="nav-item active"><a href="index.php" class="nav-link">Avaleht</a></li>
	        	<li class="nav-item"><a href="menu.php" class="nav-link">Menüü</a></li>
	        	<li class="nav-item"><a href="reservation.php" class="nav-link">Reserveerimine</a></li>
	          <li class="nav-item"><a href="contact.html" class="nav-link">Kontakt</a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->

    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_4.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread">Broneeri Laud</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Avaleht <i class="ion-ios-arrow-forward"></i></a></span> <span>Reserveerimine <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>
    <?php
    if($test == 1){
      echo '<div class="alert success">';
      echo '<span class="closebtn">&times;</span> ';
      echo '<strong>Hästi !</strong> Olete laua reserveerinud.';
      echo '</div>';
    }
    ?>
    <section class="ftco-section ftco-no-pt ftco-no-pb">
      <div class="container">
        <div class="row d-flex">
          <div class="col-md-5 ftco-animate img img-2" style="background-image: url(images/bg_6.jpg);"></div>
          <div class="col-md-7 ftco-animate makereservation p-4 p-md-5">
            <div class="heading-section ftco-animate mb-5">
              <span class="subheading">Broneeri Laud</span>
              <h2 class="mb-4">Reserveerimine</h2>
            </div>
            <form action="?">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Nimi</label>
                    <input type="text" name="nimi" class="<?php echo $nimi_proverka;?>" placeholder="Sinu Nimi" autocomplete="off" value=<?php echo $nimi_text;?> >
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">E-post</label>
                    <input type="text" name="epost" class="<?php echo $email_proverka;?>" placeholder="Sinu E-post" value=<?php echo $email_text;?>>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Telefoni number</label>
                    <input type="text" name="telefon" class="<?php echo $telefon_proverka;?>" placeholder="Sinu number" value=<?php echo $telefon_text;?>>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Kuupäev</label>
                    <input type="text" name="kuupaev" class="<?php echo $den_proverka;?>" id="book_date" onchange="myfun(this.value)" placeholder="Kuupäev" value=<?php echo $den_text;?>>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Aeg</label>

                    <div class="select-wrap one-third">
                      <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                        <select name="aeg" id="aegg" class="<?php echo $aeg_proverka ?>" >
                        <option value="0" disabled selected>Valige Aeg</option>
                        <?php
                        $kask=$yhendus->prepare("SELECT id, aeg FROM reserveerimine_aeg");
                        $kask->bind_result($id, $aeg);
                        $kask->execute();
                        while($kask->fetch()){
                          if($aeg == $aeg_text){
                            echo '<option  value='.$aeg.' selected="selected">'.$aeg.'</option>';
                          }
                          else {
                            echo '<option value='.$aeg.'>'.$aeg.'</option>';
                          }
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="hidden" name="uusrida" value="jah">
                    <label for="">Mitu inimest</label>
                    <div class="select-wrap one-third">
                      <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                      <select name="inimesed" id="" class="form-control">
                        <option value="isik">Isik</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5+">5+</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-md-12 mt-3">
                  <div class="form-group">
                      <input type="submit" value="Reserveeri" class="btn btn-primary py-3 px-5">
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

    <footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-6 col-lg-3">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Osihiteo</h2>
              <p>Parim restoran planeedil, kus saab ilma toiduga osta</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-3">
                <li class="ftco-animate"><a href="https://www.instagram.com/terkecorejz"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Oleme Avatud</h2>
              <ul class="list-unstyled open-hours">
                <li class="d-flex"><span>Esmaspäev</span><span>9:00 - 22:00</span></li>
                <li class="d-flex"><span>Teisipäev</span><span>9:00 - 21:00</span></li>
                <li class="d-flex"><span>Kolmapäev</span><span>9:00 - 23:00</span></li>
                <li class="d-flex"><span>Neljapäev</span><span>10:00 - 00:00</span></li>
                <li class="d-flex"><span>Reede</span><span>9:00 - 02:00</span></li>
                <li class="d-flex"><span>Laupäev</span><span>9:00 - 02:00</span></li>
                <li class="d-flex"><span>Pühapäev</span><span> Suletud</span></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p>Ootame kõiki ja näljaseid inimesi meie restoranis<i class="icon-heart" aria-hidden="true"></i></p>
          </div>
        </div>
      </div>
    </footer>


  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
  <script>
  var close = document.getElementsByClassName("closebtn");
  var i;

  for (i = 0; i < close.length; i++) {
    close[i].onclick = function(){
      var div = this.parentElement;
      div.style.opacity = "0";
      setTimeout(function(){ div.style.display = "none"; }, 600);
    }
  }
  </script>
  <script>
  function myfun(data){

    var req = new XMLHttpRequest();
    req.open("GET","http://localhost:8000/response.php?datavalue="+data,true);
    req.send();

    req.onreadystatechange=function(){
      if(req.readyState == 4 && req.status==200){
        document.getElementById("aegg").innerHTML = req.responseText;
      }
    }
  }
  </script>

  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>

  </body>
</html>
