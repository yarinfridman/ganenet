<!DOCTYPE html>
<html lang="en">

<head>
  <title>GaneNet - Dashboard</title>
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
  <?php include "connect.php"; ?>
  <header id="header"></header>

  <!--start child-->

  <!-- Start title -->
  <section class="bg-light pt-sm-0 py-3">
    <div class="container py-4 ">
      <!--  <img src="./assets/img/childpic.svg" alt=""> -->
      <h1 class="h2 semi-bold-600 text-center mt-2">GaneNet Dashboard</h1>
    </div>
  </section>
  <!-- End title -->

  <!-- Start personal title -->

  <section class="bg-secondary">
    <div class="container py-3">
      <div class="row d-flex justify-content-center text-center">
        <div class="col-lg-7 col-12 text-light pt-2">
          <h3 class="h4 light-300">Overview</h3>
        </div>
      </div>
  </section>

  <section class="container py-5">
    <div class="row d-flex align-items-center pb-5">

      <div class="col-lg-6 offset-lg-0 col-md-8 offset-md-2">
        <img class="rounded float-right" src="./assets/img/banner-img-03.png">
      </div>

      <div class="col-lg-6">

        <!-- over view card -->
        <div class="overview shadow-sm rounded-top rounded-3 py-sm-0 py-5">
          <div class="pl-3 pt-2">
            <ul class="list-unstyled text-center light-300">
              <li> Active children carrently:</li>
              <li class="h5 semi-bold-600 mb-0 mt-3">
                <?php $sql = "SELECT * FROM children";
                $result = $conn->query($sql);
                $rowcount = mysqli_num_rows($result);
                echo  $rowcount ?></li> <br>
            </ul>
          </div>
        </div>
        <!-- overview card -->
        <div class="overview shadow-sm rounded-top rounded-3 py-sm-0 py-5">
          <div class="row p-2">
            <div class="pl-3 pt-2">
              <ul class="list-unstyled text-center light-300">
                <li>The Gender of the children</li>
                <li class="h5 semi-bold-600 mb-0 mt-3">
                  <?php $sql = "SELECT * FROM `children` WHERE `CGender` = 'Male'";
                  $result = $conn->query($sql);
                  $rowcount = mysqli_num_rows($result);
                  echo $rowcount;
                  ?> boys and
                  <?php $sql = "SELECT * FROM children WHERE CGender = 'Female'";
                  $result = $conn->query($sql);
                  $rowcount = mysqli_num_rows($result);
                  echo $rowcount;
                  ?> girls</li>
              </ul>
            </div>
          </div>
        </div>
        <!-- overview card -->
        <div class="overview shadow-sm rounded-top rounded-3 py-sm-0 py-5">
          <div class="row p-2">
            <div class="pl-3 pt-2">
              <ul class="list-unstyled text-center light-300">
                <li>The Groups of the children</li>
                <li class="h5 semi-bold-600 mb-0 mt-3">
                  <?php $sql = "SELECT *  FROM `children` WHERE `CGroup` = 'Mature'";
                  $result = $conn->query($sql);
                  $rowcount = mysqli_num_rows($result);
                  echo $rowcount  ?> mature and
                  <?php $sql = "SELECT *  FROM `children` WHERE `CGroup` = 'Young'";
                  $result = $conn->query($sql);
                  $rowcount = mysqli_num_rows($result);
                  echo  $rowcount ?> young</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!--start Develpoment details-->

  <div class="service-tag py-5 bg-secondary">
    <div class="col-md-12">
      <ul class="nav d-flex justify-content-center">
        <!--<li class="nav-item mx-lg-4">
                    <a class="filter-btn nav-link btn-outline-primary active shadow rounded-pill text-light px-4 light-300" href="#" data-filter=".project">All</a>
                </li>-->
        <li class="nav-item mx-lg-4">
          <a class="filter-btn nav-link btn-outline-primary active shadow rounded-pill text-light px-4 light-300" data-filter=".Counting" id="selected-counting">Counting</a>
        </li>
        <li class="filter-btn nav-item mx-lg-4">
          <a class="filter-btn nav-link btn-outline-primary shadow rounded-pill text-light px-4 light-300" data-filter=".Reading">Reading</a>
        </li>
        <li class="nav-item mx-lg-4">
          <a class="filter-btn nav-link btn-outline-primary shadow rounded-pill text-light px-4 light-300" data-filter=".Selfplaying">Self playing</a>
        </li>
      </ul>
    </div>
  </div>

  </section>

  <section class="container overflow-hidden py-5">
    <div class="row gx-5 gx-sm-3 gx-lg-5 gy-lg-5 gy-3 pb-3 projects">


      <!-- start counting -->

      <div class="col-md-4 mb-3 project ui Counting" data-bs-toggle="modal" data-bs-target="#counting1" data-bs-toggle="modal">
        <div class="notPerforming-wap py-5">
          <h3 class="card-title light-300">
            <?php $sql = "SELECT *  FROM `children` WHERE `CCounting` = 'Not performing'";
            $result = $conn->query($sql);
            $rowcount = mysqli_num_rows($result);
            echo $rowcount;
            ?></h3>
          <h4 class="card-title light-300">Are not counting</h4>
        </div>
      </div>

      <div class="col-md-4 mb-3 project ui Counting" data-bs-toggle="modal" data-bs-target="#counting2" data-bs-toggle="modal">
        <div class="withHelp-wap py-5">
          <h3 class="card-title light-300">
            <?php $sql = "SELECT *  FROM `children` WHERE `CCounting` = 'With help'";
            $result = $conn->query($sql);
            $rowcount = mysqli_num_rows($result);
            echo $rowcount;
            ?></h3>
          <h4 class="card-title light-300">counting with help</h4>
        </div>
      </div>

      <div class="col-md-4 mb-3 project ui Counting" data-bs-toggle="modal" data-bs-target="#counting3" data-bs-toggle="modal">
        <div class="alone-wap py-5">
          <h3 class="card-title light-300">
            <?php $sql = "SELECT *  FROM `children` WHERE `CCounting` = 'Alone'";
            $result = $conn->query($sql);
            $rowcount = mysqli_num_rows($result);
            echo $rowcount;
            ?></h3>
          <h4 class="card-title light-300">counting alone</h4>
        </div>
      </div>

      <!-- start reading -->

      <div class="col-md-4 mb-3 project ui Reading" data-bs-toggle="modal" data-bs-target="#reading1" data-bs-toggle="modal">
        <div class="notPerforming-wap py-5">
          <h3 class="card-title light-300">
            <?php $sql = "SELECT *  FROM `children` WHERE `CReading` = 'Not performing'";
            $result = $conn->query($sql);
            $rowcount = mysqli_num_rows($result);
            echo $rowcount;
            ?></h3>
          <h4 class="card-title light-300">Are not Reading</h4>
        </div>
      </div>

      <div class="col-md-4 mb-3 project ui Reading" data-bs-toggle="modal" data-bs-target="#reading2" data-bs-toggle="modal">
        <div class="withHelp-wap py-5">
          <h3 class="card-title light-300">
            <?php $sql = "SELECT *  FROM `children` WHERE `CReading` = 'With help'";
            $result = $conn->query($sql);
            $rowcount = mysqli_num_rows($result);
            echo $rowcount;
            ?></h3>
          <h4 class="card-title light-300">Reading with help</h4>
        </div>
      </div>

      <div class="col-md-4 mb-3 project ui Reading" data-bs-toggle="modal" data-bs-target="#reading3" data-bs-toggle="modal">
        <div class="alone-wap py-5">
          <h3 class="card-title light-300">
            <?php $sql = "SELECT *  FROM `children` WHERE `CReading` = 'Alone'";
            $result = $conn->query($sql);
            $rowcount = mysqli_num_rows($result);
            echo $rowcount;
            ?>
          </h3>
          <h4 class="card-title light-300">Reading alone</h4>
        </div>
      </div>


      <!-- start Self playing -->

      <div class="col-md-4 mb-3 project ui Selfplaying" data-bs-toggle="modal" data-bs-target="#selfplay1" data-bs-toggle="modal">
        <div class="notPerforming-wap py-5">
          <h3 class="card-title light-300">
            <?php $sql = "SELECT *  FROM `children` WHERE `CSelfPlaying` = 'Not performing'";
            $result = $conn->query($sql);
            $rowcount = mysqli_num_rows($result);
            echo $rowcount;
            ?></h3>
          <h4 class="card-title light-300">Are not Self playing</h4>
        </div>
      </div>

      <div class="col-md-4 mb-3 project ui Selfplaying" data-bs-toggle="modal" data-bs-target="#selfplay2" data-bs-toggle="modal">
        <div class="withHelp-wap py-5">
          <h3 class="card-title light-300"> <?php $sql = "SELECT *  FROM `children` WHERE `CSelfPlaying` = 'With help'";
                                            $result = $conn->query($sql);
                                            $rowcount = mysqli_num_rows($result);
                                            echo $rowcount;
                                            ?></h3>
          <h4 class="card-title light-300">Self playing with help</h4>
        </div>
      </div>

      <div class="col-md-4 mb-3 project ui Selfplaying" data-bs-toggle="modal" data-bs-target="#selfplay3" data-bs-toggle="modal">
        <div class="alone-wap py-5">
          <h3 class="card-title light-300"> <?php $sql = "SELECT *  FROM `children` WHERE `CSelfPlaying` = 'Alone'";
                                            $result = $conn->query($sql);
                                            $rowcount = mysqli_num_rows($result);
                                            echo $rowcount;
                                            ?></h3>
          <h4 class="card-title light-300">Self playing alone</h4>
        </div>
      </div>


    </div>
  </section>

  <!-- start Attendance data title -->


  <section class="bg-secondary">
    <div class="container py-3">
      <div class="row d-flex justify-content-center text-center">
        <div class="col-lg-7 col-12 text-light pt-2">
          <h3 class="h4 light-300">Attendance data</h3>
        </div>
      </div>
  </section>

  <!-- start Attendance data -->

  <section class="bg-light pt-sm-0 py-3">
    <div class="center container py-4 ">
      <h3 class="semi-bold-600 text-center mt-2">Enter child and date range to view child attendance data</h3>
      <br>
      <form class="contact-form row" method="post" role="form">

        <!--first name input -->
        <?php $sql = "SELECT * FROM children";
        $result = $conn->query($sql);
        $rowcount = mysqli_num_rows($result);

        ?>

        <div class="col-lg-4 mb-4">
          <h4>Group</h4>
          <select class="form-select" aria-label="Default select example" name="View" required>
            <option value="All" selected>All</option>
            <?php if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
            ?>
                <option value="<?php echo $row["Cid"] ?>"> <?php echo $row["CFirstName"] . "&nbsp;" . $row["CLastName"] ?> </option>
               

            <?php  }
            } ?>
          </select>
        </div>

        <!--Date of start input -->

        <div class="col-lg-4">
          <h4>Start date</h4>
          <div>
            <input type="Date" class="form-control form-control-lg light-300" name="SDate" required>
          </div>
        </div>

        <!--Date of end input -->

        <div class="col-lg-4">
          <h4>End date</h4>
          <div>
            <input type="Date" class="form-control form-control-lg light-300" name="EDate" required>
          </div>
        </div>

        <div class="col-md-12 col-12 m-auto text-end">
          <br>
          <button type="submit" name="Show" class="btn btn-secondary rounded-pill px-md-5 px-4 py-2 radius-0 text-light light-300">check Attendance</button>
          <br>
        </div>
      </form>
    </div>
  </section>


  <!--Start of design output -->
  <?php
  if (isset($_POST['Show'])) {


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

    $dates = createRange($_POST['SDate'], $_POST['EDate']);
    $Cid = $_POST['View'];

    $strDates = array();
    $SArrive = 0;
    $SNotArrive = 0;
    $DayReported = 0;

    if ($Cid == "All") {
      foreach ($dates as $date) {
        $dateToExist = strval($date);
        if ($result = $conn->query("SELECT `$dateToExist` FROM `attending`")) {
          $DayReported = $DayReported + 1;

          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              $status = $row["$dateToExist"];

              if ($status == 'Arrive') {
                $SArrive = $SArrive + 1;
              }
              if ($status == 'Not arrive') {
                $SNotArrive = $SNotArrive + 1;
              }
            }
          }
        }
      }

      if ($SArrive == 0 && $SNotArrive == 0) { ?>
        <div class="overview shadow-sm rounded-top rounded-3 py-sm-0 outputResults">
          <div class="pl-3 pt-2">
            <h3 class="semi-bold-600 text-center mt-2"><?php echo "There are no attendance records for this date range"; ?></h3>
          </div>
        </div>
      <?php
      } else {
        $arrivePerCent = $SArrive / ($SArrive + $SNotArrive);
        $NotarrivePerCent = $SNotArrive / ($SArrive + $SNotArrive);
        $arrivePerCent = round($arrivePerCent * 100);
        $NotarrivePerCent = round($NotarrivePerCent * 100);
      ?>
        <div class="overview shadow-sm rounded-top rounded-3 py-sm-0 outputResults">
          <div class="pl-3 pt-2">
            <h3 class="semi-bold-600 text-center mt-2">Results for: <?php echo $_POST['SDate'] . "-" . $_POST['EDate'] ?></h3>
            <br>
            <div class="col-md-12 col-12 m-auto text-end">
              <div class="row">
                <div class="col-md-4 col-xl-3">
                  <div class="card bg-c-blue attandanceOutput-card">
                    <div class="card-block">
                      <h6 class="m-b-20">&nbsp;</h6>
                      <h2 class="text-right">ALL</h2>
                    </div>
                  </div>
                </div>

                <div class="col-md-4 col-xl-3">
                  <div class="card bg-c-yellow attandanceOutput-card">
                    <div class="card-block">
                      <h6 class="m-b-20">activity days in the range</h6>
                      <h2 class="text-right"><?php echo $DayReported ?> days</h2>
                    </div>
                  </div>
                </div>

                <div class="col-md-4 col-xl-3">
                  <div class="card bg-c-green attandanceOutput-card">
                    <div class="card-block">
                      <h6 class="m-b-20">Ateended in</h6>
                      <h2 class="text-right"><?php echo $arrivePerCent ?>% Reported</h2>
                    </div>
                  </div>
                </div>

                <div class="col-md-4 col-xl-3">
                  <div class="card bg-c-pink attandanceOutput-card">
                    <div class="card-block">
                      <h6 class="m-b-20">missed</h6>
                      <h2 class="text-right"> <?php echo $NotarrivePerCent ?>% Reported</h2>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      <?php
      }
    } else {
      
      $sql1 ="SELECT * FROM `children` WHERE `Cid`='$Cid'";
      $result1 = $conn->query($sql1);
      if ($result1->num_rows > 0) {
        while ($row = $result1->fetch_assoc()){
          $CFName = $row['CFirstName'];
          $CLName = $row['CLastName'];
        } }

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
              }
            }
          }
        }
      }

      if ($SArrive == 0 && $SNotArrive == 0) { ?>
        <div class="overview shadow-sm rounded-top rounded-3 py-sm-0 outputResults">
          <div class="pl-3 pt-2">
            <h3 class="semi-bold-600 text-center mt-2">There are no attendance records for <?php echo $_POST['CName']?> at this date range </h3>
          </div>
        </div>
      <?php
      } else {
        $arrivePerCent = $SArrive / ($SArrive + $SNotArrive);
        $NotarrivePerCent = $SNotArrive / ($SArrive + $SNotArrive);
        $arrivePerCent = round($arrivePerCent * 100);
        $NotarrivePerCent = round($NotarrivePerCent * 100);
      ?>
        <div class="overview shadow-sm rounded-top rounded-3 py-sm-0 outputResults">
          <div class="pl-3 pt-2">
            <h3 class="semi-bold-600 text-center mt-2">Results for: <?php echo $_POST['SDate'] . "-" . $_POST['EDate'] ?></h3>
            <br>
            <div class="col-md-12 col-12 m-auto text-end">
              <div class="row">
                <div class="col-md-4 col-xl-3">
                  <div class="card bg-c-blue attandanceOutput-card">
                    <div class="card-block">
                      <h6 class="m-b-20">&nbsp;</h6>
                      <h2 class="text-right"><?php echo $CFName . "&nbsp;" . $CLName ?></h2>
                    </div>
                  </div>
                </div>

                <div class="col-md-4 col-xl-3">
                  <div class="card bg-c-yellow attandanceOutput-card">
                    <div class="card-block">
                      <h6 class="m-b-20">activity days in the range</h6>
                      <h2 class="text-right"><?php echo $DayReported ?> days</h2>
                    </div>
                  </div>
                </div>

                <div class="col-md-4 col-xl-3">
                  <div class="card bg-c-green attandanceOutput-card">
                    <div class="card-block">
                      <h6 class="m-b-20">Ateended in</h6>
                      <h2 class="text-right"><?php echo $arrivePerCent ?>% Reported</h2>
                    </div>
                  </div>
                </div>

                <div class="col-md-4 col-xl-3">
                  <div class="card bg-c-pink attandanceOutput-card">
                    <div class="card-block">
                      <h6 class="m-b-20">missed</h6>
                      <h2 class="text-right"> <?php echo $NotarrivePerCent ?>% Reported</h2>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
  <?php

      }
    }
  } ?>



  <footer id="footer"></footer>


  <!-- Modal Are not counting-->
  <div class="modal fade" id="counting1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-c-pink">
          <h5 class="modal-title" id="exampleModalLabel">Children who are not counting</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <ul class="list-group">
            <?php $sql = "SELECT *  FROM `children` WHERE `CCounting` = 'Not performing'";
            $result = $conn->query($sql);
            $rowcount = mysqli_num_rows($result);
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) { ?>

                <li class="list-group-item "><?php echo $row["CFirstName"] . "&nbsp;" . $row["CLastName"]; ?>
                </li>
          </ul>
      <?php  }
            }
      ?>
        </div>
      </div>
    </div>
  </div>



  <!-- Modal counting with help-->
  <div class="modal fade" id="counting2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-c-yellow">
          <h5 class="modal-title" id="exampleModalLabel">Children who are counting with help</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <ul class="list-group">
            <?php $sql = "SELECT *  FROM `children` WHERE `CCounting` = 'With help'";
            $result = $conn->query($sql);
            $rowcount = mysqli_num_rows($result);
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) { ?>

                <li class="list-group-item "><?php echo $row["CFirstName"] . "&nbsp;" . $row["CLastName"]; ?>
                </li>
          </ul>
      <?php  }
            }
      ?>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal counting alone-->
  <div class="modal fade" id="counting3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-c-green">
          <h5 class="modal-title" id="exampleModalLabel">Children who are counting alone</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <ul class="list-group">
            <?php $sql = "SELECT *  FROM `children` WHERE `CCounting` = 'Alone'";
            $result = $conn->query($sql);
            $rowcount = mysqli_num_rows($result);
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) { ?>

                <li class="list-group-item "><?php echo $row["CFirstName"] . "&nbsp;" . $row["CLastName"]; ?>
                </li>
          </ul>
      <?php  }
            }
      ?>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Are not reading-->
  <div class="modal fade" id="reading1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-c-pink">
          <h5 class="modal-title" id="exampleModalLabel">Children who are not reading</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <ul class="list-group">
            <?php $sql = "SELECT *  FROM `children` WHERE `CReading` = 'Not performing'";
            $result = $conn->query($sql);
            $rowcount = mysqli_num_rows($result);
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) { ?>

                <li class="list-group-item "><?php echo $row["CFirstName"] . "&nbsp;" . $row["CLastName"]; ?>
                </li>
          </ul>
      <?php  }
            }
      ?>
        </div>
      </div>
    </div>
  </div>



  <!-- Modal reading with help-->
  <div class="modal fade" id="reading2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-c-yellow">
          <h5 class="modal-title" id="exampleModalLabel">Children who are reading with help</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <ul class="list-group">
            <?php $sql = "SELECT *  FROM `children` WHERE `CReading` = 'With help'";
            $result = $conn->query($sql);
            $rowcount = mysqli_num_rows($result);
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) { ?>

                <li class="list-group-item "><?php echo $row["CFirstName"] . "&nbsp;" . $row["CLastName"]; ?>
                </li>
          </ul>
      <?php  }
            }
      ?>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal reading alone-->
  <div class="modal fade" id="reading3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-c-green">
          <h5 class="modal-title" id="exampleModalLabel">Children who are reading alone</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <ul class="list-group">
            <?php $sql = "SELECT *  FROM `children` WHERE `CReading` = 'Alone'";
            $result = $conn->query($sql);
            $rowcount = mysqli_num_rows($result);
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) { ?>

                <li class="list-group-item "><?php echo $row["CFirstName"] . "&nbsp;" . $row["CLastName"]; ?>
                </li>
          </ul>
      <?php  }
            }
      ?>
        </div>
      </div>
    </div>
  </div>



  <!-- Modal Are not selfplay-->
  <div class="modal fade" id="selfplay1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-c-pink">
          <h5 class="modal-title" id="exampleModalLabel">Children who are not self playing</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <ul class="list-group">
            <?php $sql = "SELECT *  FROM `children` WHERE `CSelfPlaying` = 'Not performing'";
            $result = $conn->query($sql);
            $rowcount = mysqli_num_rows($result);
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) { ?>

                <li class="list-group-item "><?php echo $row["CFirstName"] . "&nbsp;" . $row["CLastName"]; ?>
                </li>
          </ul>
      <?php  }
            }
      ?>
        </div>
      </div>
    </div>
  </div>



  <!-- Modal selfplay with help-->
  <div class="modal fade" id="selfplay2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-c-yellow">
          <h5 class="modal-title" id="exampleModalLabel">Children who are self playing with help</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <ul class="list-group">
            <?php $sql = "SELECT *  FROM `children` WHERE `CSelfPlaying` = 'With help'";
            $result = $conn->query($sql);
            $rowcount = mysqli_num_rows($result);
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) { ?>

                <li class="list-group-item "><?php echo $row["CFirstName"] . "&nbsp;" . $row["CLastName"]; ?>
                </li>
          </ul>
      <?php  }
            }
      ?>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal selfplay alone-->
  <div class="modal fade" id="selfplay3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-c-green">
          <h5 class="modal-title" id="exampleModalLabel">Children who are self playing alone</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <ul class="list-group">
            <?php $sql = "SELECT *  FROM `children` WHERE `CSelfPlaying` = 'Alone'";
            $result = $conn->query($sql);
            $rowcount = mysqli_num_rows($result);
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) { ?>

                <li class="list-group-item "><?php echo $row["CFirstName"] . "&nbsp;" . $row["CLastName"]; ?>
                </li>
          </ul>
      <?php  }
            }
      ?>
        </div>
      </div>
    </div>
  </div>

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

      $(document).ready(function() {
        $("#selected-counting").trigger("click");
      });

    });
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