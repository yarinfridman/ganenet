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

                <div class="form-group row">
                    <div class="col-lg-4 mx-auto mb-4">
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

                </div>


                <div class="col-lg-4 mb-4">
                    <h4>Fast Selections</h4>
                    <?php $EDate = date("Y-m-d") ?>
                    <!--כפתור להחודש -->
                    <button type="submit" name="Month" class="btn btn-secondary rounded-pill px-md-5 px-4 py-2 radius-0 text-light light-300">Last month</button>
                    <input type="Date" value="<?php echo date("Y-m-d") ?>" class="form-control form-control-lg light-300" name="AEDate" hidden>
                    <input type="Date" value="<?php echo date("Y-m-d", strtotime('-1 months', strtotime($EDate))) ?>" class="form-control form-control-lg light-300" name="ASMonthDate" hidden>

                    <!--כפתור להשבוע -->
                    <button type="submit" name="Week" class="btn btn-secondary rounded-pill px-md-5 px-4 py-2 radius-0 text-light light-300">Last week</button>
                    <input type="Date" onclick="#" value="<?php echo date("Y-m-d", strtotime('-6 day', strtotime($EDate))) ?>" class="form-control form-control-lg light-300" name="ASDayDate" hidden>


                </div>


                <!--Date of start input -->

                <div class="col-lg-2">
                    <h4>Start date</h4>
                    <div>
                        <input type="Date" class="form-control form-control-lg light-300" name="SDate">
                    </div>
                </div>

                <!--Date of end input -->

                <div class="col-lg-2">
                    <h4>End date</h4>
                    <div>
                        <input type="Date" id="Today" value="0000-00-00" class="form-control form-control-lg light-300" name="EDate">
                    </div>
                </div>

                <div class="col-md-12 col-12 m-auto text-end">
                    <br>
                    <button type="submit" name="Show" value="0000-00-00" class="btn btn-secondary rounded-pill px-md-5 px-4 py-2 radius-0 text-light light-300">check Attendance</button>
                    <br>
                </div>
            </form>
        </div>
    </section>




    <!--Start of design output -->
    <?php



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


    if (isset($_POST['Show'])) {
        //AttendanceCalc($startDate1, $endDate1, $Cid)
        AttendanceCalc($_POST['SDate'], $_POST['EDate'], $_POST['View']);
    } ?>


    <?php
    if (isset($_POST['Week'])) {


        //AttendanceCalc($startDate1, $endDate1, $Cid)
        AttendanceCalc($_POST['ASDayDate'], $_POST['AEDate'], $_POST['View']);
    } ?>

    <?php

    if (isset($_POST['Month'])) {

        //AttendanceCalc($startDate1, $endDate1, $Cid)
        AttendanceCalc($_POST['ASMonthDate'], $_POST['AEDate'], $_POST['View']);
    } ?>

    <?php




    function AttendanceCalc($startDate1, $endDate1, $Cid)
    {
        global $conn;
        $dates = createRange($startDate1, $endDate1);
        $SArrive = 0;
        $SNotArrive = 0;
        $DayReported = 0;
        $Absent = "";

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



            if ($startDate1 == "0000-00-00" || $endDate1 == "0000-00-00") { ?>
                <div class="overview shadow-sm rounded-top rounded-3 py-sm-0 outputResults">
                    <div class="pl-3 pt-2">
                        <h3 class="semi-bold-600 text-center mt-2"><?php echo "Wrong input"; ?></h3>
                    </div>
                </div>

            <?php } else if ($SArrive == 0 && $SNotArrive == 0) { ?>
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
                <div class="overview shadow-sm rounded-top rounded-3 py-sm-0 outputResults" id="outputResults">
                    <div class="pl-3 pt-2">
                        <h3 class="semi-bold-600 text-center mt-2">Results from <?php echo  " " . $startDate1 . " to " . $endDate1 ?></h3>
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

            $sql1 = "SELECT * FROM `children` WHERE `Cid`='$Cid'";
            $result1 = $conn->query($sql1);
            if ($result1->num_rows > 0) {
                while ($row = $result1->fetch_assoc()) {
                    $CFName = $row['CFirstName'];
                    $CLName = $row['CLastName'];
                }
            }

            foreach ($dates as $date) {
                $dateToExist = strval($date);
                if ($result = $conn->query("SELECT `$dateToExist` FROM `attending` WHERE `Cid`='$Cid'")) {


                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $status = $row["$dateToExist"];

                            if ($status == 'Arrive') {
                                $SArrive = $SArrive + 1;
                                $DayReported = $DayReported + 1;
                            }
                            if ($status == 'Not arrive') {
                                $SNotArrive = $SNotArrive + 1;
                                $DayReported = $DayReported + 1;
                                $Absent .= "$dateToExist | ";
                            }
                        }
                    }
                }
            }

            if ($SArrive == 0 && $SNotArrive == 0) { ?>
                <div class="overview shadow-sm rounded-top rounded-3 py-sm-0 outputResults">
                    <div class="pl-3 pt-2">
                        <h3 class="semi-bold-600 text-center mt-2">There are no attendance records for <?php echo $_POST['CName'] ?> at this date range </h3>
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
                        <h3 class="semi-bold-600 text-center mt-2">Results from <?php echo  " " . $startDate1 . " to " . $endDate1 ?></h3>
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
                        <h4 class="semi-bold-600 text-center mt-2">Absent days: |<?php echo  $Absent ?></h4>

                    </div>
                </div>


    <?php

            }
        }
    } ?>




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

    <a name="down"></a>

</body>


</html>