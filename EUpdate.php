<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>


    <title>Events Update</title>

</head>

<body>

    <?php
    require_once "connect.php";

    if (isset($_GET['ECounter'])) {

        $ECounter = $_GET['ECounter'];
        $sql1 = "SELECT * FROM `Events` WHERE `ECounter` = '$ECounter'";

        $result = $conn->query($sql1);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) { ?>

                <Main class="bg-light row container mx-auto pt-sm-5 py-5">
                    <form method="post">
                        <!-- יצירת אירוע -->
                        <div class="card mb-4 row rounded-3 shadow-sm">
                            <div class="card-header py-3">
                                <h4 class="my-0 fw-normal text-center">Creat new event</h4>
                            </div>
                            <div class="row">
                                <section class="col-md-6 card-body">
                                    <h3 class="card-title pricing-card-title">Date</h3>
                                    <ul class="list-unstyled mt-3 mb-4">
                                        <li><input type="date" class="form-control" name="EDate" value="<?php echo $row["EDate"] ?>" required></li>
                                    </ul>
                                    <h3 class="card-title pricing-card-title">time</h3>
                                    <ul class="list-unstyled mt-3 mb-4">
                                        <li><input type="time" class="form-control" name="ETime" value="<?php echo $row["ETime"] ?>" required></li>
                                    </ul>
                                </section>
                                <section class="col-md-6 card-body">
                                    <h3 class="card-title pricing-card-title">Even name</h3>
                                    <ul class="list-unstyled mt-3 mb-4">
                                        <li><input type="text" class="form-control" name="EName" value="<?php echo $row["EName"] ?>" required></li>
                                    </ul>
                                    <h3 class="card-title pricing-card-title">Location</h3>
                                    <ul class="list-unstyled mt-3 mb-4">
                                        <li><input type="text" class="form-control" name="ELocation" value="<?php echo $row["ELocation"] ?>" required>
                                        <input type="hidden" class="form-control" name="ECounter" value="<?php echo $row["ECounter"] ?>" required></li>
                                        
                                    </ul>
                                </section>
                            </div>

                        </div>
                        <button type="submit" name="EUpdate" class="btn rounded-pill btn-secondary text-light text-center px-4 light-300">Update</button>
                     

                        
                    </form>


        <?php
            }
        }
    } ?>

                </Main>
        <?php
        if (isset($_POST['EUpdate'])) {

            $ECounter = ($_POST['ECounter']);
            $EDate = ($_POST['EDate']);
            $ETime = ($_POST['ETime']);
            $EName = ($_POST['EName']);
            $ELocation = ($_POST['ELocation']);
            $sql2 = ("UPDATE `Events` SET `EDate`='$EDate', `ETime`=' $ETime', `EName`='$EName', `ELocation`='$ELocation' WHERE `ECounter` = '$ECounter'");
            $result = $conn->query($sql2);
            echo "<script>location.href='EView.php'</script>";
        }

       
        ?>

</body>

</html>