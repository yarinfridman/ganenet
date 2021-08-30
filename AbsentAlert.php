<?php

include "connect.php";

function createRange($startDate, $endDate)
{
  $tmpDate = new DateTime($startDate);
  $tmpEndDate = new DateTime($endDate);

  $outArray = array();
  do {
    $outArray[] = $tmpDate->format('Y-m-d');
  } while ($tmpDate->modify('+1 day') <= $tmpEndDate);

  return $outArray;
}


$EDate = date("Y-m-d");
$SDate = date("Y-m-d", strtotime('-1 months', strtotime($EDate)));
$dates = createRange($SDate, $EDate);



if (isset($_POST['Update'])) {

  //יצירת מערך תוצאות
  //array([Cid], [Dates], [Retult])

  $results = array([], [], []);

  $DateToEdit = strval($_POST['DateToEdit']);
  for ($i = 0; $i <= sizeof($_POST['Cids']) - 1; $i++) {
    $DateStatus = $_POST['CurrentPicks'][$i];
    $value = $_POST['Cids'][$i];
    $results[$i][0] = $value; //השמת ת.ז ברשימת התוצאות
    $sql3 = ("UPDATE `attending` SET `$DateToEdit`='$DateStatus' WHERE `Cid`='$value'");
    $result = $conn->query($sql3);

    if ($DateStatus != "Not entered") {

      $Cid = $value;


      $strDates = array();
      $SArrive = 0;
      $SNotArrive = 0;
      $DayReported = 0;

      //הוצאת שם פרטי ומשפחה
      //$sql1 = "SELECT * FROM `children` WHERE `Cid`='$Cid'";
      // $result1 = $conn->query($sql1);
      // if ($result1->num_rows > 0) {
      //      while ($row = $result1->fetch_assoc()) {
      //          $CFName = $row['CFirstName'];
      //           $CLName = $row['CLastName'];
      //      }
      //  }

      foreach ($dates as $date) {
        $dateToExist = strval($date);

        if ($result = $conn->query("SELECT `$dateToExist` FROM `attending` WHERE `Cid`='$Cid'")) {
          $DayReported = $DayReported + 1;
          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              $status = $row["$dateToExist"];

              if ($status == 'Arrive') {
                $SArrive = $SArrive + 1;
              }
              if ($status == 'Not arrive') {
                $SNotArrive = $SNotArrive + 1;
                $results[$i][1] .= " $dateToExist |";
              }
            }
          }
        }
      }

      if ($SArrive == 0 && $SNotArrive == 0) {
      } else {
        $arrivePerCent = $SArrive / ($SArrive + $SNotArrive);
        $NotarrivePerCent = $SNotArrive / ($SArrive + $SNotArrive);
        $arrivePerCent = round($arrivePerCent * 100);
        $results[$i][2] = $NotarrivePerCent = round($NotarrivePerCent * 100);
        $results[$i][3] = $SArrive + $SNotArrive;
      }
    }
  }

  //בדיקה האם להעביר מיד לדף הנוכחות [אמת] או להציג את ההתראות
  $Alert = true;

  for ($i = 0; $i <= sizeof($_POST['Cids']) - 1; $i++) {

    if ($results[$i][2] > 50 &&  $results[$i][3] > 10) {
      $Alert = false;
    }
  }

  if ($Alert == true) {

    echo "<script>location.href='Attendance.html'</script>";
  }
?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <title>Ganenet - Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    <!-- Load Require CSS >-->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font CSS -->
    <link href="assets/css/boxicon.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
    <!-- Load Tempalte CSS -->
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <!-- Custom CSS-->
    <link rel="stylesheet" href="assets/css/custom.css">

  </head>

  <body>
    <header id="header"></header>
    <section class="container py-5">


      <div class="container py-4 ">
        <!--  <img src="./assets/img/childpic.svg" alt=""> -->
        <h3 class="h3 semi-bold-600 text-center mt-2">please be noted that The following children have been absent from kindergarten for more than 50% of the days during the past month</h3>
        <h4 class="light-300 text-center">
          You might wanna check with their parents that they are all well.
        </h4>
        <h5 class="light-300 text-center">
          *More than 10 attendance reports were entered this month
        </h5>
      </div>
      <!--  start of first child -->



      <?php

      for ($i = 0; $i <= sizeof($_POST['Cids']) - 1; $i++) {

        $OutPutCid = $results[$i][0];

        if ($results[$i][2] > 50 &&  $results[$i][3] > 10) {
          $sql1 = "SELECT * FROM `children` WHERE `Cid`='$OutPutCid'";
          $result1 = $conn->query($sql1);
          if ($result1->num_rows > 0) {
            while ($row = $result1->fetch_assoc()) {
              $COFName = $row['CFirstName'];
              $COLName = $row['CLastName'];
              $P1FN = $row['P1FirstName'];
              $P1LN = $row['P1LastName'];
              $P1PN = $row['P1PhoneNum'];
              $P2FN = $row['P2FirstName'];
              $P2LN = $row['P2LastName'];
              $P2PN = $row['P2PhoneNum'];
              $Cid = $row['Cid'];
            }
          }
      ?>
          <div class="overview shadow-sm rounded-top  rounded-3 py-sm-0 outputResults">
            <div class="pl-3 pt-2">
              <br>
              <div class="col-md-12 col-12 m-auto text-end">
                <div class="row">
                  <div class="col-md-4 col-xl-3">
                    <div class="card bg-c-blue attandanceOutput-card">
                      <div class="card-block">
                        <h6 class="m-b-20">Child Name</h6>
                        <h2 class="text-right"><?php echo $COFName . " " . $COLName ?></h2>
                      </div>
                    </div>
                  </div>



                  <div class="col-md-4 col-xl-3">
                    <div class="card bg-c-pink attandanceOutput-card">
                      <div class="card-block">
                        <h6 class="m-b-20">absent persntage</h6>
                        <h2 class="text-right"><?php echo $results[$i][2] ?>%</h2>
                      </div>
                    </div>
                  </div>


                  <div class="col-md-4 col-xl-3">
                    <div class="card bg-c-yellow attandanceOutput-card">
                      <div class="card-block">
                        <h6 class="m-b-20">parent #1 | <?php echo $P1FN . " " . $P1LN ?> </h6>
                        <h2 class="m-b-20"> <?php echo $P1PN ?></h2>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-4 col-xl-3">
                    <div class="card bg-c-green attandanceOutput-card">
                      <div class="card-block">
                        <h6 class="m-b-20">parent #2 | <?php echo $P2FN . " " . $P2LN ?></h6>
                        <h2 class="text-right"><?php echo $P2PN ?></h2>
                      </div>
                    </div>
                  </div>

                  <div class="recent-work-content text-start mb-3 ml-3 text-dark">
                    <h3 class="card-title light-300"> <b> absent days: </b></h3>
                    <h6 class="card-title light-300"> <?php echo $results[$i][1] ?></h6>
                    <br>
                  </div>

                </div>
              </div>
            </div>
          </div>
          </div>
    <?php

        }
      }
    }
    ?>

    </section>

    <section>
      <div class="container py-5">
        <div class="banner-content col-lg-8 col-12 m-lg-auto text-center">
          <a class="banner-button btn rounded-pill btn-outline-primary btn-lg px-4" href="Attendance.html" role="button">Back to Attendance Report</a>
          <br>
          <br>
        </div>
      </div>
    </section>



    <footer id="footer"></footer>



    <script>
      $(window).load(function() {
        // init Isotope
        var $projects = $('.projects').isotope({
          itemSelector: '.project',
          layoutMode: 'fitRows'
        });

        $(".filter-btn").click(function() {
          var data_filter = $(this).attr("data-filter");
          $projects.isotope({
            filter: data_filter
          });
          $(".filter-btn").removeClass("active");
          $(".filter-btn").removeClass("shadow");
          $(this).addClass("active");
          $(this).addClass("shadow");
          return false;
        });
      });
    </script>
    <script>
      function myFunction() {
        var x = document.getElementById("outputResults");
        if (x.style.display === "none") {
          x.style.display = "block";
        } else {
          x.style.display = "none";
        }
      }
    </script>




    <!-- Bootstrap -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <!-- Lightbox-->
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
    <script>
      $(".btn-info").click(function() {
        //$(this).removeClass('btn-info');
        $(this).toggleClass('btn-success');
        $(this).toggleClass('btn-info');
      });
    </script>

  </body>

  </html>