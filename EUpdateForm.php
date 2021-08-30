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

    
    <?php require_once "connect.php";

    if (isset($_GET['ECounter'])) {

        $ECounter = $_GET['ECounter'];


        $sql = "SELECT * FROM `Events` WHERE `ECounter` = '$ECounter'";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) { ?>
                
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update event</h5>
              
            </div>
            <div class="modal-body">
                <form class="contact-form row" method="post" role="form">
                    <div class>
                        <h4>Name of the event</h4>
                        <input type="text" class="form-control form-control-lg light-300" value="<?php echo $row["EName"] ?>"  name="EName" required>
                    </div><!-- End Input Name -->

                    <div class>
                        <h4>Date</h4>
                        <input type="date" class="form-control form-control-lg light-300" value="<?php echo $row["EDate"] ?>" name="EDate" required>
                    </div><!-- End Input Date -->

                    <div class>
                        <h4>Start hour</h4>
                        <input type="time" class="form-control form-control-lg light-300"  value="<?php echo $row["ETime"] ?>" name="ETime" required>
                    </div><!-- End Input hour -->


                    <div class>
                        <h4>Location</h4>
                        <input type="text" class="form-control form-control-lg light-300" name="ELocation" value="<?php echo $row["ELocation"] ?>" required>
                    </div>

                    <br>
                    <!-- End Input location -->

                    <input type="hidden" value="<?php echo $row["ECounter"] ?>" name="ECounter">

                    <div class="col-md-12 col-12 m-auto text-end">
                        <button type="submit" class="btn btn-secondary rounded-pill px-md-5 px-4 py-2 radius-0 text-light light-300" name="EUpdate2">Update</button>
                    </div>

                </form>

                
                <?php
                }
            }
        }

                    ?>

            </div>
        </div>
    </div>

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
        $(".btn-info").click(function () {
            //$(this).removeClass('btn-info');
            $(this).toggleClass('btn-success');
            $(this).toggleClass('btn-info');
        });
    </script>

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

</body>

</html>