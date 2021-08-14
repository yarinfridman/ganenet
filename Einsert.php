<?php
require_once 'connect.php';

$EDate = $_POST["EDate"];
$ETime = $_POST["ETime"];
$EName = $_POST["EName"];
$ELocation = $_POST["ELocation"];



$insert_sql = "INSERT INTO `Events` (`ECounter`, `EDate`, `ETime`, `EName`, `ELocation`) VALUES (NULL, '$EDate', '$ETime', '$EName', '$ELocation')";
$result = $conn->query($insert_sql);



echo "<script>location.href='EView.php'</script>";


?>