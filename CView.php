<!DOCTYPE html>
<html lang="en">

<head>
    <title>Ganenet - Child Info</title>
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
            <h1 class="h2 semi-bold-600 text-center mt-2">Child Details</h1>
        </div>
    </section>
    <!-- End title -->

    <!-- Start personal title -->


    <?php require_once "connect.php";

    if (isset($_GET['Cid'])) {

        $childrenID = $_GET['Cid'];
       

        $sql = "SELECT * FROM `children` WHERE `Cid` = '$childrenID'";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) { ?>

                <section class="bg-secondary">
                    <div class="container py-3">
                        <div class="row d-flex justify-content-center text-center">
                            <div class="col-lg-7 col-12 text-light pt-2">
                                <h3 class="h4 light-300">Personal Details</h3>
                            </div>
                        </div>
                </section>
                <!-- End personal title -->
                <!-- Start personal input -->
                <section class="bg-light pt-sm-0 py-3">
                    <div class="container py-4 ">
                        <form class="contact-form row" role="form">

                            <!--first name input -->

                            <div class="col-lg-4 mb-4">
                                <div class="form-floating">
                                    <input type="text" class="form-control form-control-lg light-300" id="floatingnFame" value="<?php echo $row["CFirstName"] ?> " readonly>
                                    <label for="floatingnFame light-300">First Name</label>
                                </div>
                            </div>

                            <!--last name input -->

                            <div class="col-lg-4 mb-4">
                                <div class="form-floating">
                                    <input type="text" class="form-control form-control-lg light-300" value="<?php echo $row["CLastName"] ?>" id="floatingLname" readonly>
                                    <label for="floatingLname light-300">Last Name</label>
                                </div>
                            </div>

                            <!--ID input -->

                            <div class="col-lg-4 mb-4">
                                <div class="form-floating mb-4">
                                    <input type="text" class="form-control form-control-lg light-300" id="floatingid" value="<?php echo $row["Cid"] ?>" readonly>
                                    <label for="floatingid light-300">ID Number</label>
                                </div>
                            </div>

                            <!--Date of Birth input -->

                            <div class="col-lg-4 mb-4">
                                <div class="form-floating">
                                    <input type="Date" class="form-control form-control-lg light-300" id="floatingDateOFBIrth" value="<?php echo $row["CDateOFBIrth"] ?>" readonly>
                                    <label for="floatingDateOFBIrth light-300">Date of Birth</label>
                                </div>
                            </div>

                            <!--Adress input -->
                            <div class="col-lg-8 mb-4">
                                <div class="form-floating">
                                    <input type="text" class="form-control form-control-lg light-300" id="floatingAdress" value="<?php echo $row["CAddress"] ?>" readonly>
                                    <label for="floatingcompany light-300">Full Adress</label>
                                </div>
                            </div>

                            <!--Gender input -->

                            <div class="col-lg-4 mb-4">
                                <h4>Gender</h4>
                                <?php
                                $selected = $row['CGender'];
                                ?>
                                <select class="form-select" aria-label="Default select example" value="<?php echo $row["CGender"] ?>" disabled>
                                    <option value="1" <?php if ($selected == 'Male') {
                                                            echo ("selected");
                                                        } ?>>Male</option>
                                    <option value="2" <?php if ($selected == 'Female') {
                                                            echo ("selected");
                                                        } ?>>Female</option>
                                </select>
                            </div>

                            <!--Group input -->

                            <div class="col-lg-4 mb-4">
                                <h4>Group</h4>
                                <?php
                                $selected = $row['CGroup'];
                                ?>
                                <select class="form-select" aria-label="Default select example" name="CGroup" value="<?php echo $row["CGroup"] ?>" disabled>
                                    <option value="1" <?php if ($selected == 'Young') {
                                                            echo ("selected");
                                                        } ?>>Young</option>
                                    <option value="2" <?php if ($selected == 'Mature') {
                                                            echo ("selected");
                                                        } ?>>Mature</option>
                                </select>
                            </div>
                    </div>
                </section>
                <!-- End personal input -->

                <!-- Start Parents title -->
                <section class="bg-secondary">
                    <div class="container py-3">
                        <div class="row d-flex justify-content-center text-center">
                            <div class="col-lg-7 col-12 text-light pt-2">
                                <h3 class="h4 light-300">Parents Details</h3>
                            </div>
                        </div>
                </section>
                <!-- Start Parents input -->

                <section class="bg-light pt-sm-0 py-3">
                    <div class="container py-4 ">
                        <div class="contact-form row">

                            <h3>parent #1</h3>
                            <br>
                            <!--P1 first name input -->

                            <div class="col-lg-4 mb-4">
                                <div class="form-floating">
                                    <input type="text" class="form-control form-control-lg light-300" id="floatingnP1FName" value="<?php echo $row["P1FirstName"] ?>" readonly>
                                    <label for="floatingnP1FName light-300">First Name</label>

                                </div>
                            </div>

                            <!--P1 last name input -->

                            <div class="col-lg-4 mb-4">
                                <div class="form-floating">
                                    <input type="text" class="form-control form-control-lg light-300" id="floatingP1Lname" value="<?php echo $row["P1LastName"] ?>" readonly>
                                    <label for="floatingP1Lname light-300">Last Name</label>
                                </div>
                            </div>

                            <!--P1 Phone input -->

                            <div class="col-lg-4 mb-4">
                                <div class="form-floating">
                                    <input type="text" class="form-control form-control-lg light-300" id="floatingP1PhoneNum" value="<?php echo $row["P1PhoneNum"] ?>" readonly>
                                    <label for="floatingP1PhoneNum light-300">Phone Number</label>
                                </div>
                            </div>

                            <h3>parent #2</h3>
                            <br>
                            <!--P2 first name input -->

                            <div class="col-lg-4 mb-4">
                                <div class="form-floating">
                                    <input type="text" class="form-control form-control-lg light-300" id="floatingnP2FName" value="<?php echo $row["P2FirstName"] ?>" readonly>
                                    <label for="floatingnP2FName light-300">First Name</label>

                                </div>
                            </div>

                            <!--P2 last name input -->

                            <div class="col-lg-4 mb-4">
                                <div class="form-floating">
                                    <input type="text" class="form-control form-control-lg light-300" id="floatingP2Lname" value="<?php echo $row["P2LastName"] ?>" readonly>
                                    <label for="floatingP2Lname light-300">Last Name</label>
                                </div>
                            </div>

                            <!--P2 Phone input -->

                            <div class="col-lg-4 mb-4">
                                <div class="form-floating">
                                    <input type="text" class="form-control form-control-lg light-300" id="floatingP2PhoneNum" value="<?php echo $row["P2PhoneNum"] ?>" readonly>
                                    <label for="floatingP2PhoneNum light-300">Phone Number</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- End Parents input -->

                <!-- Start impression title -->

                <section class="bg-secondary">
                    <div class="container py-3">
                        <div class="row d-flex justify-content-center text-center">
                            <div class="col-lg-7 col-12 text-light pt-2">
                                <h3 class="h4 light-300">Impression</h3>
                            </div>
                        </div>
                </section>
                <!-- End impression title -->

                <!-- Start impression input -->

                <section class="bg-light pt-sm-0 py-3">
                    <div class="container py-4 ">
                        <div class="contact-form row">

                            <!--Reading input -->

                            <div class="col-lg-4 mb-4">
                                <h4>Reading</h4>
                                <?php
                                $selected = $row['CReading'];
                                ?>
                                <select class="form-select" aria-label="Default select example" name="CReading" value="<?php echo $row["CReading"] ?>" disabled>
                                    <option value="1" <?php if ($selected == 'Alone') {
                                                            echo ("selected");
                                                        } ?>>Alone</option>
                                    <option value="2" <?php if ($selected == 'With help') {
                                                            echo ("selected");
                                                        } ?>>With help</option>
                                    <option value="3" <?php if ($selected == 'Not performing') {
                                                            echo ("selected");
                                                        } ?>>Not performing</option>
                                </select>
                            </div>

                            <!--CCounting input -->

                            <div class="col-lg-4 mb-4">
                                <h4>Counting</h4>
                                <?php
                                $selected = $row['CCounting'];
                                ?>
                                <select class="form-select" aria-label="Default select example" name="CCounting" value="<?php echo $row["CCounting"] ?>" disabled>
                                    <option value="1" <?php if ($selected == 'Alone') {
                                                            echo ("selected");
                                                        } ?>>Alone</option>
                                    <option value="2" <?php if ($selected == 'With help') {
                                                            echo ("selected");
                                                        } ?>>With help</option>
                                    <option value="3" <?php if ($selected == 'Not performing') {
                                                            echo ("selected");
                                                        } ?>>Not performing</option>
                                </select>
                            </div>

                            <!--Self playing input -->

                            <div class="col-lg-4 mb-4">
                                <h4>Self playing</h4>
                                <?php
                                $selected = $row['CSelfPlaying'];
                                ?>
                                <select class="form-select" aria-label="Default select example" name="CSelfPlaying" value="<?php echo $row["CSelfPlaying"] ?>" disabled>
                                    <option value="1" <?php if($selected == 'Alone'){echo("selected");}?>>Alone</option>
                                    <option value="2" <?php if($selected == 'With help'){echo("selected");}?>>With help</option>
                                    <option value="3" <?php if($selected == 'Not performing'){echo("selected");}?>>Not performing</option>
                                </select>
                            </div>

                            <!--Comments input -->

                            <div class="col-12">
                                <div class="form-floating mb-3">
                                    <textarea class="form-control light-300" rows="8" id="floatingtextarea" readonly><?php echo $row["CComments"] ?></textarea>
                                    <label for="floatingtextarea light-300">Comments</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-12 m-auto text-end">
                            <a type="button" class="btn btn-secondary rounded-pill px-md-5 px-4 py-2 radius-0 text-light light-300" href="CUpdateForm.php?Cid=<?php echo $row['Cid']; ?>">Update</a>
                            <a type="button" class="btn btn-primarybanner-button btn rounded-pill btn-outline-primary btn-lg px-4" role="button" href="CDelete.php?Cid=<?php echo $row['Cid']; ?>">Delete</a>

                                <!-- End impression input -->

                        </div>
                        </form>
                    </div>
                </section>
    <?php
            }
        }
    }
    ?>

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