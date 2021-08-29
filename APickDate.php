<!DOCTYPE html>
<html lang="en">

<head>
    <title>Ganenet - Attendance</title>
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

    <?php

    include "connect.php";

    if (isset($_GET['PickDate'])) {

        $PickDate = strval($_GET['PickDate']);
    } ?>

    <header id="header"></header>

    <!-- Start Banner Hero -->
    <div id="work_banner" class="banner-wrapper bg-light w-100 py-5">
        <div class="banner-vertical-center-work container text-light d-flex justify-content-center align-items-center py-5 p-0">
            <div class="banner-content col-lg-8 col-12 m-lg-auto text-center">
                <h1 class="banner-heading h2 display-3 pb-5 semi-bold-600 typo-space-line-center">Attendance Management</h1>
                <input type="date" id="start" value="<?php echo $PickDate ?>" readonly>
            </div>
        </div>
    </div>
    <!-- End Banner Hero -->

    <?php
    $sql = "ALTER TABLE `attending` ADD `$PickDate` ENUM('Not entered','Arrive','Not arrive','') NOT NULL;";

    $result = $conn->query($sql);

    echo $result;

    $sql2 = "SELECT * FROM `attending` INNER JOIN `children` ON `attending`.`Cid` = `children`.`Cid`";
    $result = $conn->query($sql2);

    ?>

    <!-- Start table -->
    <section class="container py-5">
        <div class='jumbotron'> </div>
        <div class='container'>
            <table class="table table-striped">
                <thead class='thead-dark'>
                    <tr>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Attendance</th>
                    </tr>
                </thead>
                <tbody>
                    <form method="POST">
                        <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                if ($row["CFirstName"] != '') { ?>
                                    <tr>
                                        <?php
                                        $selected = $row["$PickDate"];
                                        ?>
                                        <td><?php echo $row["CFirstName"] ?></td>
                                        <td><?php echo $row["CLastName"] ?></td>
                                        <td>
                                            <div class="form-check form-switch">
                                                <select class="form-select" aria-label="Default select example" name="CurrentPicks[]">
                                                    <option value="1" <?php if ($selected == 'Not entered') {
                                                                            echo ("selected");
                                                                        } ?>>Not entered</option>
                                                    <option value="2" <?php if ($selected == 'Arrive') {
                                                                            echo ("selected");
                                                                        } ?>>Arrive</option>
                                                    <option value="3" <?php if ($selected == 'Not arrive') {
                                                                            echo ("selected");
                                                                        } ?>>Not arrive</option>
                                                </select>
                                                <input type="hidden" value="<?php echo $row["Cid"] ?>" name="Cids[]">
                                                <input type="hidden" value="<?php echo $PickDate ?>" name="DateToEdit">
                                            </div>
                                        </td>
                                    </tr>
                        <?php }
                            }
                        }  ?>

                </tbody>
            </table>
            <div class="text-center">
                <button type="submit" name="Update" class="btn rounded-pill btn-secondary text-light px-4 light-300">Update</button>

            </div>
            </form>

            <?php
            if (isset($_POST['Update'])) {

                $DateToEdit = strval($_POST['DateToEdit']);
                for ($i = 0; $i <= sizeof($_POST['Cids']) - 1; $i++) {
                    $DateStatus = $_POST['CurrentPicks'][$i];
                    $value = $_POST['Cids'][$i];
                    $sql3 = ("UPDATE `attending` SET `$DateToEdit`='$DateStatus' WHERE `Cid`='$value'");
                    $result = $conn->query($sql3);
                }

                echo "<script>location.href='Attendance.html'</script>";
            }

            ?>

    </section>
    <!-- End table -->
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

</html>