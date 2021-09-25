<?php
$apiDate = file_get_contents("https://api.openweathermap.org/data/2.5/onecall?lat=32.3780&lon=34.9834&exclude=minutely,hourly,alerts,current&appid=71fca4643a02d807296768562101d558");
$weatherArray = json_decode($apiDate, true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ganenet - Home Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    <!-- Load Require CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font CSS -->
    <link href="assets/css/boxicon.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
    <!-- Load Tempalte CSS -->
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/custom.css">


</head>

<body>
    <header id="header"></header>

    <!--start hp-->
    <div id="clouds">
	<div class="cloud x1"></div>
    <div class="row d-flex align-items-center py-5">
        <div class="recent-work-header row text-center pb-5">
            <h2><span class="h1 text- text-center py-5 HPGanenet" >Gane</span><span class="text-primary h1 HPGanenet">Net</span></h2>
            <p class="light-300">
                A great tool for managing your kindergarten. <br> and making sure you provide the kids necessities</p>
        </div>
    </div>
	<div class="cloud x2"></div>
	<div class="cloud x4"></div>
	   <!--<div class="cloud x4"></div>
	<div class="cloud x5"></div>-->
    
</div>
              <section class="py-5 mb-5">
                <div class="container">
                   <!-- <div class="recent-work-header row text-center pb-5">
                        <h2 class="col-md-6 m-auto h2 semi-bold-600 py-5">Features</h2>
                    </div>-->
                    <div class="row gy-5 g-lg-5 mb-4">
                        <!-- Start Recent Work -->
                        <div class="col-md-4 mb-3">
                            <a href="childrenList.php" class="recent-work card border-0 shadow-lg overflow-hidden">
                                <img class="recent-work-img card-img" src="./assets/img/recent-work-01.jpg" alt="Card image">
                                <div class="recent-work-vertical card-img-overlay d-flex align-items-end">
                                    <div class="recent-work-content text-start mb-3 ml-3 text-dark">
                                        <h3 class="card-title light-300">Children Files</h3>
                                        <p class="card-text">All the information needed is right here</p>
                                    </div>
                                </div>
                            </a>
                        </div><!-- End Recent Work -->
        
                        <!-- Start Recent Work -->
                        <div class="col-md-4 mb-3">
                            <a href="Attendance.html" class="recent-work card border-0 shadow-lg overflow-hidden">
                                <img class="recent-work-img card-img" src="./assets/img/recent-work-02.jpg" alt="Card image">
                                <div class="recent-work-vertical card-img-overlay d-flex align-items-end">
                                    <div class="recent-work-content text-start mb-3 ml-3 text-dark">
                                        <h3 class="card-title light-300">Attendance</h3>
                                        <p class="card-text">track the attendance of the chilidren</p>
                                    </div>
                                </div>
                            </a>
                        </div><!-- End Recent Work -->
        
                        <!-- Start Recent Work -->
                        <div class="col-md-4 mb-3">
                            <a href="Events.php" class="recent-work card border-0 shadow-lg overflow-hidden">
                                <img class="recent-work-img card-img" src="./assets/img/recent-work-03.jpg" alt="Card image">
                                <div class="recent-work-vertical card-img-overlay d-flex align-items-end">
                                    <div class="recent-work-content text-start mb-3 ml-3 text-dark">
                                        <h3 class="card-title light-300">Events</h3>
                                        <p class="card-text">create special events for the kindergarten</p>
                                    </div>
                                </div>
                            </a>
                        </div><!-- End Recent Work -->
        
                        <!-- Start Recent Work 
                        <div class="col-md-4 mb-3">
                            <a href="#" class="recent-work card border-0 shadow-lg overflow-hidden">
                                <img class="recent-work-img card-img" src="./assets/img/recent-work-04.jpg" alt="Card image">
                                <div class="recent-work-vertical card-img-overlay d-flex align-items-end">
                                    <div class="recent-work-content text-start mb-3 ml-3 text-dark">
                                        <h3 class="card-title light-300">Public Relation</h3>
                                        <p class="card-text">Lorem ipsum dolor sit amet</p>
                                    </div>
                                </div>
                            </a>
                        </div> End Recent Work -->
                    </div>
                </div>
            </section>
            <!-- End Recent Work -->


            <section class="container py-5">
                            <div class="container py row">
                                <div class="card mb-4 outputResults" style="border-radius: 25px;">
                                    <div class="card-body p-4">
                                        <div class="d-flex justify-content-around text-center mb-4 pb-3 pt-2 row row-cols-auto">
                    
                                            <?php for ($i = 0; $i <= sizeof($weatherArray['daily']) - 1; $i++) {
                                                $date = date("Y-m-d", $weatherArray['daily'][$i]['dt']);
                                                $day = date("l", $weatherArray['daily'][$i]['dt']);
                                                $temp = round($weatherArray['daily'][$i]['temp']['day'] - 273.15);
                                                $des = $weatherArray['daily'][$i]['weather'][0]['description'];
                                                $icon = $weatherArray['daily'][$i]['weather'][0]['icon'];
                                                $iconImg = "http://openweathermap.org/img/wn/$icon@2x.png"; ?>
                                                <div class="flex-column">
                                                    <p class="small"><strong>  <?php echo $day ?> <br> <?php echo $date ?></strong></p>
                                                    <img class="fa-2x mb-3" src="<?php echo $iconImg ?>" alt="icon img">
                                                    <p class="mb-0"><strong> <?php echo $temp ?>  °C </strong> <br>
                                                    <p>  <?php echo $des ?></p>
                                                    <br></p>
                                                    <p>
                                                        <?php
                                                        require_once "connect.php";
                                                        $sql = "SELECT * FROM `Events` WHERE `EDate` = '$date'";
                                                        $result = $conn->query($sql);
                                                        if ($result->num_rows > 0) {
                                                            while ($row = $result->fetch_assoc()) { ?>
                                                                 <strong> <?php echo $row["EName"] ?> </strong> <br>
                                                        <?php }
                                                        } else {
                                                            echo "No events today";
                                                        } ?>
                                                    </p>
                                                </div> <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

          <!-- start Video -->
      
        
          <div class="row justify-content-center">
                <div class="col-lg-8 pt-4 pb-4">
                    <div class="ratio ratio-16x9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/W-Uqjo-82TM" allowfullscreen></iframe>
                    </div>
                </div>
            </div><!-- End Video -->


    <!--End hp-->


    <footer id="footer"></footer>

    <!-- Bootstrap -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <!-- Lightbox -->
    <script src="assets/js/fslightbox.js"></script>
    <!-- Load jQuery require for isotope -->
    <script src="assets/js/jquery.min.js"></script>
    <!-- Isotope -->
    <script src="assets/js/isotope.pkgd.js"></script>
    <!-- Page Script -->
    <script>
    $("#header").load("header.html");
    $("#footer").load("footer.html");
    </script>

    <!-- Templatemo -->
    <script src="assets/js/templatemo.js"></script>
    <!-- Custom -->
    <script src="assets/js/custom.js"></script>
    <script>$( ".btn-info" ).click(function() {
        //$(this).removeClass('btn-info');
        $(this).toggleClass('btn-success');
        $(this).toggleClass('btn-info');
      });</script>

</body>

</html>