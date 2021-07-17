<?php
/* error_reporting(E_ALL);
ini_set("display_errors", 1);
include("file_with_errors.php");*/

    $page=$_GET['page'] ?? 'index';
    $pages = array("index"=>"Kalender", "galerie"=>"Fotos", "ausstattung"=>"Lage &amp; Ausstattung",
    "preise"=>"Preise", "checkin"=>"Ankunft", "checkout"=>"Abreise",  "404"=>"Not Found");

    if(!in_array($page.'.php', scandir('inc'))){
        $page = "404";
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Iepenlaan 18 - <?php echo $page ?></title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="css/carousel.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


      <link href='css/fullcalendar.css' rel='stylesheet' />
    <link href='css/fullcalendar.print.css' rel='stylesheet' media='print' />
    <script src='js/moment.min.js'></script>
    <script src='js/jquery.min.js'></script>
    <script src='js/fullcalendar.min.js'></script>
    <script src='js/gcal.js'></script>
      <script>

	$(document).ready(function() {

		$('#calendar').fullCalendar({
			googleCalendarApiKey: 'AIzaSyCKm1j72sYt_IqGiIrGHociBIT2D-oS930',
			events: 'qp9v8l8end3aeos70j0sbnfco8@group.calendar.google.com',
            height: 450,
			loading: function(bool) {
				$('#loading').toggle(bool);
			}

		});

	});

</script>
      <script src="js/bootstrap.min.js"></script>


  </head>
   <body>
    <div class="navbar-wrapper">
      <div class="container">

        <div class="navbar   navbar-inverse navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="index.php?page=index#">Iepenlaan 18</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <?php

                  foreach($pages as $file => $name){
                      if($file=="404"){continue;}
                      if($file == $page){
                        echo "<li class='active'>";
                      }else{
                        echo "<li>";
                      }
                      echo "<a href='index.php?page=".$file."'>".$name."</a></li>";
                  }

                ?>
              </ul>
            </div>
          </div>
        </div>

      </div>
    </div>

    <?php include('inc/'.$page.'.php');?>
   </body>
</html>
