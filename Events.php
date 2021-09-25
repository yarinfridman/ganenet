<!DOCTYPE html>
<html lang="en">

<head>
    <title>Ganenet - Events</title>
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
    <!-- Start Banner Hero -->
    <div id="work_banner" class="banner-wrapper bg-light w-100 py-5">
        <div class="banner-vertical-center-work container text-light d-flex justify-content-center align-items-center py-5 p-0">
            <div class="banner-content col-lg-8 col-12 m-lg-auto text-center">
                <form action="get">
                    <h1 class="banner-heading h2 display-3 pb-5 semi-bold-600 typo-space-line-center">Calender</h1>
                    <h3 class="h5 pb-2 regular-400">pick a day to view and update the Events</h3>
                    <input type="date" id="start" name="MyDate">
                    <br>
                    <!-- צפייה -->

                    <button type="submit" formaction="Events.php" class="btn rounded-pill btn-secondary text-light px-4 light-300 addEventButton">Show</button>
                    <br>
                </form>

                <!-- יצירה -->
                <button type="button" class="btn rounded-pill btn-secondary text-light px-4 light-300 addEventButton" data-bs-toggle="modal" data-bs-target="#exampleModal">Create new event</button>
            </div>
            <br>

        </div>
    </div>

    <!-- End Banner Hero -->


    <!-- הצגה -->
    <?php
    require_once 'connect.php';

    if (isset($_GET['MyDate'])) {

        $MyDate = strval($_GET['MyDate']);


        $sql = "SELECT * FROM `Events` WHERE `EDate` = '$MyDate' ORDER BY `ETime`";
        $result = $conn->query($sql);
    ?>
        <section class=" row bg-light pt-sm-0 py-5">
            <div class="container py-5">
                <div class="banner-content col-lg-12 col-12 m-lg-auto">
                    <h1 class="h2 semi-bold-600 text-center mt-2 col-6">Event for <?php echo $MyDate ?></h1>
                    <br>
                </div>
                <!-- Start  Horizontal -->
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) { ?>
                        <div class="events-horizontal row col-10 m-auto d-flex shadow-sm rounded overflow-hidden bg-white">
                            <div class="events-horizontal-icon col-md-3 text-center bg-secondary text-light py-4">
                                <br>
                                <svg xmlns="http://www.w3.org/2000/svg" width="50%" height="50%" fill="white" class="bi bi-calendar-check-fill" viewBox="0 0 16 16">
                                    <path d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zm-5.146-5.146-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708.708z" />
                                </svg>
                            </div>
                            <div class="events-horizontal-body offset-lg-1 col-md-5 col-lg-4 d-flex align-items-center pl-5 pt-lg-0 pt-4">
                                <ul class="text-left px-4 list-unstyled mb-0 light-300">
                                    <h2 class="h3 pb-4 typo-space-line"><?php echo $row["EName"] ?></h2>
                                    <br>
                                    <li><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                            <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" />
                                        </svg><?php echo $row["ELocation"] ?></li>
                                    <li><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                                            <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z" />
                                            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z" />
                                        </svg></i><?php echo $row["ETime"] ?></li>
                                    <br>
                                </ul>
                            </div>
                            <div class="events-horizontal-tag col-md-4 text-center pt-3 d-flex align-items-center">
                                <div class="w-100 light-300">
                                    <form method="post">
                                        <input type="hidden" class="form-control" name="ECounter" value="<?php echo $row["ECounter"] ?>"></li>
                                        <button type="submit" name="EDelete" class="btn rounded-pill btn-secondary text-light px-4 light-300 addEventButton">Delete</button> <br>
                                    </form>
                                    <a type="button" class="btn rounded-pill btn-secondary text-light px-4 light-300 addEventButton" href="EUpdateForm.php?ECounter=<?php echo $row["ECounter"] ?>"> Update</a>
                            
                                </div>
                            </div>
                        </div>
                        <br>
                        
                <?php
                    }
                }
                ?>
            </div>

        </section>
    <?php

    }

    if (isset($_POST['EDelete'])) {
        $MyDate = $row["EDate"];
        $ECounter = ($_POST['ECounter']);
        $sql3 = ("DELETE FROM `Events` WHERE `ECounter` = '$ECounter'");
        $result = $conn->query($sql3);
        echo "<script>location.href='Events.php'</script>";
    }
    ?>


    </section>


    <footer id="footer"></footer>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create new event</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="contact-form row" action="Einsert.php" method="post" role="form">
                        <div class>
                            <h4>Name of the event</h4>
                            <input type="text" class="form-control form-control-lg light-300" name="EName" required>
                        </div><!-- End Input Name -->

                        <div class>
                            <h4>Date</h4>
                            <input type="date" class="form-control form-control-lg light-300" name="EDate" required>
                        </div><!-- End Input Date -->

                        <div class>
                            <h4>Start hour</h4>
                            <input type="time" class="form-control form-control-lg light-300" name="ETime" required>
                        </div><!-- End Input hour -->


                        <div class>
                            <h4>Location</h4>
                            <input type="text" class="form-control form-control-lg light-300" name="ELocation" required>
                        </div>
                        <!-- End Input location -->

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">submit</button>
                        </div>

                    </form>
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