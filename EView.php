<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>


    <title>Events</title>

</head>

<body>


    <section class="bg-light pt-sm-0 py-5">
        <!-- צפייה -->

        <form action="get">
            <div class="container py-5">
                <div class="banner-content col-lg-8 col-12 m-lg-auto text-center">
                    <input type="date" id="start" name="MyDate">
                    <button type="submit" formaction="EView.php" class="btn btn-primary">Show</button>
                </div>
        </form>


        <!-- יצירה -->
        <br>
        <div class="banner-content col-lg-8 col-12 m-lg-auto text-center">
            <a href="ECreat.html" class="btn rounded-pill px-4 btn-outline-primary mb-3">Create new event</a>
        </div>

        <br>
        <!-- הצגה -->

        <?php
        require_once 'connect.php';

        if (isset($_GET['MyDate'])) {

            $MyDate = strval($_GET['MyDate']);


            $sql = "SELECT * FROM `Events` WHERE `EDate` = '$MyDate'";
            $result = $conn->query($sql);
        ?>

            <section class="row">
                <?php
                if ($result->num_rows > 0) {
                ?> <br> <?php
                        while ($row = $result->fetch_assoc()) { ?>
                        <div class="mb-4">
                            <div class="pricing-horizontal col-12 m-auto d-flex shadow-sm rounded overflow-hidden bg-white">
                                <div class="pricing-horizontal-icon col-md-3 text-center bg-secondary text-light py-4">
                                    <h5 class="h5 semi-bold-600 pb-4 light-300"><?php echo $row["EDate"] ?></h5>
                                </div>
                                <div class="pricing-horizontal-body offset-lg-1 col-md-5 col-lg-4 d-flex align-items-center pl-5 pt-lg-0 pt-4">
                                    <ul class="text-left px-4 list-unstyled mb-0 light-300">

                                        <h2 class="h3 pb-4 typo-space-line"><?php echo $row["EName"] ?></h2>
                                        <br>
                                        <li><i class="bx bxs-circle me-2"></i><?php echo $row["ELocation"] ?></li>
                                        <li><i class="bx bxs-circle me-2"></i><?php echo $row["ETime"] ?></li>

                                        <br>
                                    </ul>
                                </div>
                                <div class="pricing-horizontal-tag col-md-4 text-center pt-3 d-flex align-items-center">
                                    <div class="w-100 light-300">
                                        <a href="EUpdate.php?ECounter=<?php echo $row["ECounter"]; ?>" class="btn rounded-pill px-4 btn-outline-primary mb-3">Edit</a>
                                        <form method="post">
                                            <input type="hidden" class="form-control" name="ECounter" value="<?php echo $row["ECounter"] ?>" required></li>
                                            <button type="submit" name="EDelete" class="btn rounded-pill px-4 btn-outline-primary mb-3">Delete</button>
                                        </form>
                                    </div>

                                </div>


                            </div>
                        </div>

                <?php
                        }
                    }
                ?>
            </section>
        <?php
        }

        if (isset($_POST['EDelete'])) {
            $MyDate = $row["EDate"];
            $ECounter = ($_POST['ECounter']);
            $sql3 = ("DELETE FROM `Events` WHERE `ECounter` = '$ECounter'");
            $result = $conn->query($sql3);
            echo "<script>location.href='EView.php?MyDate='$MyDate'</script>";
        }

        ?>

</body>

</html>