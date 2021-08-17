<?php
$apiDate = file_get_contents("https://api.openweathermap.org/data/2.5/onecall?lat=32.3780&lon=34.9834&exclude=minutely,hourly,alerts,current&appid=71fca4643a02d807296768562101d558");
$weatherArray = json_decode($apiDate, true);

?>
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

    <section class="container py-5">
        <div class="container">
            <table class="table table-striped">

                <thead>
                    <tr>
                        <th scope="col"><br> Date</th>
                        <th scope="col"><br> Weather</th>
                        <th scope="col"><br> Events</th>
                    </tr>
                </thead>
                <?php for ($i = 0; $i <= sizeof($weatherArray['daily']) - 1; $i++) {
                    $date = date("Y-m-d", $weatherArray['daily'][$i]['dt']);
                    $day = date("l", $weatherArray['daily'][$i]['dt']);
                    $temp = round($weatherArray['daily'][$i]['temp']['day'] - 273.15);
                    $des = $weatherArray['daily'][$i]['weather'][0]['description'];
                    $icon = $weatherArray['daily'][$i]['weather'][0]['icon'];
                    $iconImg = "http://openweathermap.org/img/wn/$icon@2x.png";

                ?>
                    <tbody>
                        <tr>
                            <td> <?php echo $date ?> <br> <?php echo $day ?> </td>
                            <td> <img src="<?php echo $iconImg ?>" alt="icon img"> <br>
                                <?php echo $des ?> <br> <?php echo $temp ?>°C </td>
                            <td>
                                <?php
                                require_once "connect.php";
                                $sql = "SELECT * FROM `Events` WHERE `EDate` = '$date'";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) { ?>
                                        <?php echo $row["EName"]?>
                             <?php } 
                                } else {echo "No events today";} ?></td>
                        </tr>
                    </tbody>
                <?php } ?>
            </table>





</body>

</html>