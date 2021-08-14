<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Attending</title>

</head>

<body>



    <?php

    include "connect.php";

    if (isset($_GET['PickDate'])) {

        $PickDate = strval($_GET['PickDate']);
    } ?>

    <form method="get" class="col-md-6 mx-auto">
        <h1 class="container text-center mb-4 mt-4 ">Attending form:</h1>
        <ul class="list-unstyled mt-3 mb-4">
            <li><input type="date" class="form-control" value="<?php echo $PickDate ?>" readonly></li>
        </ul>

        </section>
    </form>


    <?php
    $sql = "ALTER TABLE `attending` ADD `$PickDate` ENUM('Not entered','Arrive','Not arrive','') NOT NULL;";

    $result = $conn->query($sql);

    echo $result;

    //`CFirstName`, `CLastName`, `$PickDate`

    $sql2 = "SELECT * FROM `attending` INNER JOIN `children` ON `attending`.`Cid` = `children`.`Cid`";
    $result = $conn->query($sql2);


    ?>

    <section class="container py-5">
        <div class="container">
            <table class="table table-striped">
                <thead>
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
                                        </td>
                                    </tr>

                        <?php }
                            }
                        }  ?>


                </tbody>
            </table>
            <br>
            <button type="submit" name="Update" class="btn btn-primary">Update</button>
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

                echo "<script>location.href='Attending.html'</script>";
            }

            ?>



            </main>


</body>

<!--<script>
        var x = document.getElementById("form");
        function hide() {
            x.style.display = "none";
        }
        function show() {
            x.style.display = "block";
        }
    </script>-->

</html>