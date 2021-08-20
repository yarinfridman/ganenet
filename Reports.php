<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Attending</title>

</head>

<body>

<?php include "connect.php"; ?>
<!-- כמה ילדים יש בגן -->
<?php $sql = "SELECT * FROM children";
$result = $conn->query($sql);
$rowcount = mysqli_num_rows($result);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo $row["CFirstName"];
    }
}
echo "Children" . $rowcount . "<br>";
?>
<!--כמה ילדים  בנות יש בגן -->
<?php $sql = "SELECT * FROM children WHERE CGender = 'Female'";
$result = $conn->query($sql);
$rowcount = mysqli_num_rows($result);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo $row["CFirstName"];
    }
}
echo "Female" . $rowcount . "<br>";
?>
<!--כמה ילדים בנים יש בגן -->
<?php $sql = "SELECT * FROM `children` WHERE `CGender` = 'Male'";
$result = $conn->query($sql);
$rowcount = mysqli_num_rows($result);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo $row["CFirstName"];
    }
}
echo "Male" . $rowcount . "<br>";
?>
<!--כמה צעירים יש בגן -->
<?php $sql = "SELECT *  FROM `children` WHERE `CGroup` = 'Young'";
$result = $conn->query($sql);
$rowcount = mysqli_num_rows($result);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo $row["CFirstName"];
    }
}
echo "Young" . $rowcount . "<br>"; ?>
<!--כמה בוגרים יש בגן -->
<?php $sql = "SELECT *  FROM `children` WHERE `CGroup` = 'Mature'";
$result = $conn->query($sql);
$rowcount = mysqli_num_rows($result);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo $row["CFirstName"];
    }
}
echo "Mature" . $rowcount . "<br>"; ?>

<!--קריאה -->

<?php $sql = "SELECT *  FROM `children` WHERE `CReading` = 'Alone'";
$result = $conn->query($sql);
$rowcount = mysqli_num_rows($result);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo $row["CFirstName"];
    }
}
echo "Alone" . $rowcount . "<br>"; 



?>



</body>



</html>

