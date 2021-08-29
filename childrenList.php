<!DOCTYPE html>
<html lang="en">

<head>
    <title>Ganenet - Children</title>
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

    <!--start children-->

    <section>
        <div class="container py-5">
            <h2 class="h2 text- text-center py-5">Our childrens</h2>
            <div class="row text-center">
                <?php
                require_once 'connect.php';

                $sql = "select * from children";
                $result = $conn->query($sql);
                //"sdasdas"."sadsadsa"
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        if ($row["CFirstName"] != '') {
                ?>
                            <div class="col-md-3 mb-3">
                                <div class="card child-wap py-5" onclick="window.location.href='CView.php?Cid=<?php echo $row['Cid'];?>'">
                                    <h3 class="card-title light-300 text-center"><?php echo $row["CFirstName"] . "&nbsp;" . $row["CLastName"] ?></h3>
                                </div>
                            </div>
                <?php }
                    }
                }
                ?>
            </div>
        </div>
        </div>
        <div class="banner-content col-lg-8 col-12 m-lg-auto text-center">
            <a class="banner-button btn rounded-pill btn-outline-primary btn-lg px-4" href="childInfo.html" role="button">Add new child</a>
            <br>
            <br>
        </div>
    </section>
    <!--End children-->


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