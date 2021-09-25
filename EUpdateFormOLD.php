<!DOCTYPE html>
<html lang="en">

<head>
    <title>Event Update</title>
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

    
    <!--start child-->

    <!-- Start title -->
    <section class="bg-light pt-sm-0 py-3">
        <div class="container py-4 ">
            <!--  <img src="./assets/img/childpic.svg" alt=""> -->
            <h1 class="h2 semi-bold-600 text-center mt-2">Event Update</h1>
        </div>
    </section>
    <!-- End title -->

    <!-- Start personal title -->


    <?php require_once "connect.php";

    if (isset($_GET['ECounter'])) {

        $ECounter = $_GET['ECounter'];


        $sql = "SELECT * FROM `Events` WHERE `ECounter` = '$ECounter'";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) { ?>
                <form class="contact-form row" role="form" method="post">

                    <section class="bg-secondary">
                        <div class="container py-3">
                            <div class="row d-flex justify-content-center text-center">
                                <div class="col-lg-7 col-12 text-light pt-2">
                                    <h3 class="h4 light-300">Personal Details</h3>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- End personal title -->
                    <!-- Start personal input -->


                    <section class="bg-light pt-sm-0 py-3 ">
                        <div class="container py-4 ">
                            <div class="contact-form row">


                                <!--Event name input -->

                                <div class="col-lg-4 mb-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control form-control-lg light-300" value="<?php echo $row["EName"] ?>" id="floatingLname" name="EName" require>
                                        <label for="floatingLname light-300">Name of the event</label>
                                    </div>
                                </div>

                                <!--Event Date -->

                                <div class="col-lg-4 mb-4">
                                    <div class="form-floating">
                                        <input type="date" class="form-control form-control-lg light-300" name="EDate" id="floatingnFame" value="<?php echo $row["EDate"] ?>" require>
                                        <label for="floatingnFame light-300">Date</label>
                                    </div>
                                </div>


                                <!--Event start -->

                                <div class="col-lg-4 mb-4">
                                    <div class="form-floating mb-4">
                                        <input type="time" class="form-control form-control-lg light-300" id="floatingid" value="<?php echo $row["ETime"] ?>" name="ETime" require>
                                        <label for="floatingid light-300">Start hour</label>
                                    </div>
                                </div>

                                <!--Event Location -->

                                <div class="col-lg-4 mb-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control form-control-lg light-300" id="floatingDateOFBIrth" value="<?php echo $row["ELocation"] ?>" name="ELocation" require>
                                        <label for="floatingDateOFBIrth light-300">Location</label>
                                    </div>
                                </div>

                                <input type="hidden" value="<?php echo $row["ECounter"] ?>" name="ECounter">



                    <?php
                }
            }
        }

                    ?>

                    <div class="col-md-12 col-12 m-auto text-end">
                        <button type="submit" class="btn btn-secondary rounded-pill px-md-5 px-4 py-2 radius-0 text-light light-300" name="EUpdate2">Update</button>
                    </div>

                            </div>
                        </div>
                    </section>

                </form>

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
                <script>
                    $(".btn-info").click(function() {
                        //$(this).removeClass('btn-info');
                        $(this).toggleClass('btn-success');
                        $(this).toggleClass('btn-info');
                    });
                </script>

</body>

<?php

if (isset($_POST['EUpdate2'])) {

    $ECounter = ($_POST['ECounter']);
    $EDate = ($_POST['EDate']);
    $ETime = ($_POST['ETime']);
    $EName = ($_POST['EName']);
    $ELocation = ($_POST['ELocation']);
    $sql2 = ("UPDATE `Events` SET `EDate`='$EDate', `ETime`=' $ETime', `EName`='$EName', `ELocation`='$ELocation' WHERE `ECounter` = '$ECounter'");
    $result = $conn->query($sql2);
    echo "<script>location.href='Events.php'</script>";
}


?>

</html>