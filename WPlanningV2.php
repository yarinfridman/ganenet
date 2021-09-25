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

    <section class="container py-5 row">
        <div class="container py">
            <div class="card mb-4" style="border-radius: 25px;">
                <div class="card-body p-4 ">
                    <div class="d-flex justify-content-around text-center mb-4 pb-3 pt-2 row row-cols-auto">

                        <?php for ($i = 0; $i <= sizeof($weatherArray['daily']) - 1; $i++) {
                            $date = date("Y-m-d", $weatherArray['daily'][$i]['dt']);
                            $day = date("l", $weatherArray['daily'][$i]['dt']);
                            $temp = round($weatherArray['daily'][$i]['temp']['day'] - 273.15);
                            $des = $weatherArray['daily'][$i]['weather'][0]['description'];
                            $icon = $weatherArray['daily'][$i]['weather'][0]['icon'];
                            $iconImg = "http://openweathermap.org/img/wn/$icon@2x.png"; ?>
                            <div class="flex-column">
                                <p class="small"><strong>  <?php echo $day ?> <br> <?php echo $date ?></strong></p>
                                <img class="fa-2x mb-3" src="<?php echo $iconImg ?>" alt="icon img">
                                <p class="mb-0"><strong> <?php echo $temp ?>  °C </strong> <br>
                                <h1 class="banner-heading h2 display-3 pb-5 semi-bold-600 typo-space-line-center">  <?php echo $des ?></h1>
                                <br></p>
                                <p>
                                    <?php
                                    require_once "connect.php";
                                    $sql = "SELECT * FROM `Events` WHERE `EDate` = '$date'";
                                    $result = $conn->query($sql);
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) { ?>
                                             <strong> <?php echo $row["EName"] ?> </strong> <br>
                                    <?php }
                                    } else {
                                        echo "No events today";
                                    } ?>
                                </p>
                            </div> <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>