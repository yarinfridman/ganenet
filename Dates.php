<?php require_once "connect.php"; ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>


    <title>Dates</title>

</head>

<body>

    <form method="post">

        <h3 class="card-title pricing-card-title">start Date</h3>
        <li><input type="date" class="form-control" name="SDate" required></li>

        <h3 class="card-title pricing-card-title">end Date</h3>
        <li><input type="date" class="form-control" name="EDate" required></li>
        <?php $sql = "SELECT * FROM children";
        $result = $conn->query($sql);
        $rowcount = mysqli_num_rows($result);

        ?>
        <li><select class="form-select" aria-label="Default select example" name="View" required>
                <option value="All" selected>All</option>
                <?php if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <option value="<?php echo $row["Cid"] ?>"> <?php echo $row["CFirstName"] . "&nbsp; &nbsp;" . $row["CLastName"] ?></option>
                <?php  }
                } ?>
            </select></li>

        <button type="submit" name="Show" class="btn rounded-pill btn-secondary text-light text-center px-4 light-300">Show</button>

    </form>

    <?php
    if (isset($_POST['Show'])) {


        function createRange($startDate, $endDate)
        {
            $tmpDate = new DateTime($startDate);
            $tmpEndDate = new DateTime($endDate);

            $outArray = array();
            do {
                $outArray[] = $tmpDate->format('Y-m-d');
            } while ($tmpDate->modify('+1 day') <= $tmpEndDate);

            return $outArray;
        }

        $dates = createRange($_POST['SDate'], $_POST['EDate']);
        $Cid = $_POST['View'];

        $strDates = array();
        $SArrive = 0;
        $SNotArrive = 0;

        if ($Cid =="All")
        {
            foreach ($dates as $date) {
                $dateToExist = strval($date);
                if ($result = $conn->query("SELECT `$dateToExist` FROM `attending`")) {
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $status = $row["$dateToExist"];
                        
                            if ($status == 'Arrive') {
                                $SArrive = $SArrive + 1;
                            }
                            if ($status == 'Not arrive') {
                                $SNotArrive = $SNotArrive + 1;
                            }
                          
                        
                    }
                    
                }
                }
            }
    
            $arrivePerCent = $SArrive / ($SArrive + $SNotArrive);
    
            echo "Arrive" . $SArrive . "<br> NOT Arrive" . $SNotArrive . "<br> Rate" . $arrivePerCent . "% <br>";
        } else {
            foreach ($dates as $date) {
                $dateToExist = strval($date);
                if ($result = $conn->query("SELECT `$dateToExist` FROM `attending` WHERE `Cid`='$Cid'")) {
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $status = $row["$dateToExist"];
                         
                        }
                    }
                    if ($status == 'Arrive') {
                        $SArrive = $SArrive + 1;
                    }
                    if ($status == 'Not arrive') {
                        $SNotArrive = $SNotArrive + 1;
                    }
                }
            }
    
            $arrivePerCent = $SArrive / ($SArrive + $SNotArrive);
    
            echo "Arrive" . $SArrive . "<br> NOT Arrive" . $SNotArrive . "<br> Rate" . $arrivePerCent . "% <br>";
        }
    }
        
    
    ?>

</body>

</html>