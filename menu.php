<?php
require('conf.php');
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Osihiteo - Menüü</title>
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
    <!--teste -- >
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
            <h1 class="mb-2 bread">Specialties</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Avaleht <i class="ion-ios-arrow-forward"></i></a></span> <span>Menüü <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>


		<section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center mb-5 pb-2">
          <div class="col-md-7 text-center heading-section ftco-animate">
          	<span class="subheading">Terve</span>
            <h2 class="mb-4">Meie Menüü</h2>
          </div>
        </div>
        <div class="row">
        	<div class="col-md-6 col-lg-4 menu-wrap">
        		<div class="heading-menu text-center ftco-animate">
        			<h3>Eelroad</h3>
        		</div>
            <?php
            $kask=$yhendus->prepare("SELECT id, nimi,maksab,sisaldus,kategooria,pilt FROM menuu  WHERE kategooria = 'Eelroad'");
            $kask->bind_result($id, $nimi, $maksab, $sisaldus, $kategooria,$pilt);
            $kask->execute();
            while($kask->fetch()){
                echo '<div class="menus d-flex ftco-animate">';
                echo '<div class="menu-img img" style="background-image: url(images/restoraan/'.$pilt.');">';
                echo '</div>';
                echo '<div class="text">';
                echo '<div class="d-flex">';
                echo '<div class="one-half">';
                echo '<h3>'.$nimi.'</h3>';
                echo '</div>';
                echo '<div class="one-forth">';
                echo '<span class="price">'.$maksab.' €</span>';
                echo '</div>';
                echo '</div>';
                echo '<p><span>'.$sisaldus.'</span></p>';
                echo '</div>';
                echo '</div>';

          }
            ?>
            </div>

        	<div class="col-md-6 col-lg-4 menu-wrap">
        		<div class="heading-menu text-center ftco-animate">
        			<h3>Pearoad</h3>
        		</div>
            <?php
            $paljuu= 0;
            $kask=$yhendus->prepare("SELECT id, nimi,maksab,sisaldus,kategooria,pilt FROM menuu  WHERE kategooria = 'Pearoad'");
            $kask->bind_result($id, $nimi, $maksab, $sisaldus, $kategooria,$pilt);
            $kask->execute();
            while($kask->fetch()){
                echo '<div class="menus d-flex ftco-animate">';
                echo '<div class="menu-img img" style="background-image: url(images/restoraan/'.$pilt.');">';
                echo '</div>';
                echo '<div class="text">';
                echo '<div class="d-flex">';
                echo '<div class="one-half">';
                echo '<h3>'.$nimi.'</h3>';
                echo '</div>';
                echo '<div class="one-forth">';
                echo '<span class="price">'.$maksab.' €</span>';
                echo '</div>';
                echo '</div>';
                echo '<p><span>'.$sisaldus.'</span></p>';
                echo '</div>';
                echo '</div>';
          }
            ?>
        </div>

        	<div class="col-md-6 col-lg-4 menu-wrap">
        		<div class="heading-menu text-center ftco-animate">
        			<h3>Magustoit</h3>
        		</div>
            <?php
            $kask=$yhendus->prepare("SELECT id, nimi,maksab,sisaldus,kategooria,pilt FROM menuu  WHERE kategooria = 'Magustoit'");
            $kask->bind_result($id, $nimi, $maksab, $sisaldus, $kategooria,$pilt);
            $kask->execute();
            while($kask->fetch()){
                echo '<div class="menus d-flex ftco-animate">';
                echo '<div class="menu-img img" style="background-image: url(images/restoraan/'.$pilt.');">';
                echo '</div>';
                echo '<div class="text">';
                echo '<div class="d-flex">';
                echo '<div class="one-half">';
                echo '<h3>'.$nimi.'</h3>';
                echo '</div>';
                echo '<div class="one-forth">';
                echo '<span class="price">'.$maksab.' €</span>';
                echo '</div>';
                echo '</div>';
                echo '<p><span>'.$sisaldus.'</span></p>';
                echo '</div>';
                echo '</div>';
          }
            ?>
        </div>


        	<!--  -->
        	<div class="col-md-6 col-lg-4 menu-wrap">
        		<div class="heading-menu text-center ftco-animate">
        			<h3>Joogid</h3>
        		</div>
            <?php
            $paljuu= 0;
            $kask=$yhendus->prepare("SELECT id, nimi,maksab,sisaldus,kategooria,pilt FROM menuu  WHERE kategooria = 'Joogid'");
            $kask->bind_result($id, $nimi, $maksab, $sisaldus, $kategooria,$pilt);
            $kask->execute();
            while($kask->fetch()){
              if($paljuu == 3){

              }
              else{
                echo '<div class="menus d-flex ftco-animate">';
                echo '<div class="menu-img img" style="background-image: url(images/restoraan/'.$pilt.');">';
                echo '</div>';
                echo '<div class="text">';
                echo '<div class="d-flex">';
                echo '<div class="one-half">';
                echo '<h3>'.$nimi.'</h3>';
                echo '</div>';
                echo '<div class="one-forth">';
                echo '<span class="price">'.$maksab.' €</span>';
                echo '</div>';
                echo '</div>';
                echo '<p><span>'.$sisaldus.'</span></p>';
                echo '</div>';
                echo '</div>';
                $paljuu = $paljuu + 1;
              }
          }
            ?>
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
