<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Children View</title>

</head>

<body>

    <?php require_once "connect.php";

    if (isset($_GET['Cid'])) {

        $childrenID = $_GET['Cid'];
        echo "GET succes";
        echo $childrenID;

        $sql = "SELECT * FROM `children` WHERE `Cid` = '$childrenID'";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) { ?>
                <h1 class="container text-center mb-4 mt-4">Childern Folder: <?php echo $row["CFirstName"] . "&nbsp; &nbsp;" . $row["CLastName"] ?></h1>

                <main class="row container mx-auto">
                    <!-- פרטים אישיים -->
                    <section class="col-md-4">
                        <div class="col">
                            <div class="card mb-4 rounded-3 shadow-sm">
                                <div class="card-header py-3">
                                    <h4 class="my-0 fw-normal">Pesonal info</h4>
                                </div>
                                <div class="card-body">
                                    <h3 class="card-title pricing-card-title">ID</h3>
                                    <ul class="list-unstyled mt-3 mb-4">
                                        <li><?php echo $row["Cid"] ?></li>
                                    </ul>
                                    <h3 class="card-title pricing-card-title">Date Of Birth</h3>
                                    <ul class="list-unstyled mt-3 mb-4">
                                        <li><?php echo $row["CDateOFBIrth"] ?></li>
                                    </ul>
                                    <h3 class="card-title pricing-card-title">Gender</h3>
                                    <ul class="list-unstyled mt-3 mb-4">
                                        <li><?php echo $row["CGender"] ?></li>
                                    </ul>
                                    <h3 class="card-title pricing-card-title">Address</h3>
                                    <ul class="list-unstyled mt-3 mb-4">
                                        <li><?php echo $row["CAddress"] ?></li>
                                    </ul>
                                    <h3 class="card-title pricing-card-title">Group</h3>
                                    <ul class="list-unstyled mt-3 mb-4">
                                        <li><?php echo $row["CGroup"] ?></li>
                                    </ul>
                                </div>
                            </div>
                    </section>

                    <section class="col-md-4">
                        <!-- פרטי הורים -->
                        <div class="card mb-4 rounded-3 shadow-sm">
                            <div class="card-header py-3">
                                <h4 class="my-0 fw-normal">Parents info</h4>
                            </div>
                            <div class="card-body">
                                <h3 class="card-title pricing-card-title"> <?php echo $row["P1FirstName"] . "&nbsp; &nbsp;" . $row["P1LastName"] ?> </h3>
                                <ul class="list-unstyled mt-3 mb-4">
                                    <li><?php echo $row["P1PhoneNum"] ?></li>
                                </ul>
                                <h3 class="card-title pricing-card-title"><?php echo $row["P2FirstName"] . "&nbsp; &nbsp;" . $row["P2LastName"] ?></h3>
                                <ul class="list-unstyled mt-3 mb-4">
                                    <li><?php echo $row["P2PhoneNum"] ?></li>
                                </ul>
                            </div>
                        </div>

                        <!-- התרשמות -->
                        <div class="card mb-4 rounded-3 shadow-sm">
                            <div class="card-header py-3">
                                <h4 class="my-0 fw-normal">Imppression</h4>
                            </div>
                            <div class="card-body">
                                <ul class="list-unstyled mt-3 mb-4">
                                    <li><?php echo $row["CComments"] ?></li>
                                </ul>


                            </div>
                    </section>

                    <section class="col-md-4">
                        <!-- מצב התפתחותי -->
                        <!-- alert-success alert-danger alert-warning -->
                        <div class="card mb-4 rounded-3 shadow-sm">
                            <div class="card-header py-3">
                                <h4 class="my-0 fw-normal">Development info</h4>
                            </div>
                            <div class="card-body">
                                <h3 class="card-title pricing-card-title">Reading</h3>
                                <ul class="list-unstyled mt-3 mb-4">
                                    <li>
                                        <div class="alert" role="alert" id="reading">
                                            <?php echo $row["CReading"] ?>
                                        </div>
                                    </li>
                                </ul>
                                <h3 class="card-title pricing-card-title">Counting</h3>
                                <ul class="list-unstyled mt-3 mb-4">
                                    <li>
                                        <div class="alert" role="alert">
                                            <?php echo $row["CCounting"] ?>
                                        </div>
                                    </li>
                                </ul>
                                <h3 class="card-title pricing-card-title">Self playing</h3>
                                <ul class="list-unstyled mt-3 mb-4">
                                    <li>
                                        <div class="alert" role="alert">
                                            <?php echo $row["CSelfPlaying"] ?>
                                        </div>
                                    </li>
                                </ul>
                    </section>
                    <section class="container mx-auto">
                        <div class="mx-auto">
                        <a class="btn btn-info" href="CUpdateForm.php?Cid=<?php echo $row['Cid']; ?>"> Update </a>
                            <a type="button" class="btn btn-secondary" href="CDelete.php?Cid=<?php echo $row['Cid']; ?>">Delete</a>
                        </div>
                    </section>
                </main>
                 <!--<script>
                    var reading = 
                    document.write(reading);
                    if (reading == "Alone") {
                        document.getElementById("reading").addClass("alert-success")
                    }
                </script>-->

    <?php
            }
        }
    }
    ?>

</body>



</html>