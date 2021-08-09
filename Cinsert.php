<?php
require_once 'connect.php';

$Cid = $_POST["Cid"];
$CFirstName = $_POST["CFirstName"];
$CLastName = $_POST["CLastName"];
$CGender = $_POST["CGender"];
$CAddress = $_POST["CAddress"];
$CGroup = $_POST["CGroup"];
$CComments = $_POST["CComments"];
$CDateOFBIrth = $_POST["CDateOFBIrth"];
$P1FirstName = $_POST["P1FirstName"];
$P1LastName = $_POST["P1LastName"];
$P1PhoneNum	 = $_POST["P1PhoneNum"];
$P2FirstName = $_POST["P2FirstName"];
$P2LastName = $_POST["P2LastName"];
$P2PhoneNum	 = $_POST["P2PhoneNum"];
$CReading = $_POST["CReading"];
$CCounting = $_POST["CCounting"];
$CSelfPlaying = $_POST["CSelfPlaying"];


$insert_sql = "INSERT INTO children (Cid,CFirstName,CLastName,CGender,CAddress,CGroup,CComments,CDateOFBIrth,P1FirstName,P1LastName,P1PhoneNum,P2FirstName,P2LastName,P2PhoneNum,CReading,CCounting,CSelfPlaying) VALUES(
    '" . $Cid . "',
    '" . $CFirstName . "',
    '" . $CLastName . "',
    '" . $CGender . "',
    '" . $CAddress . "',
    '" . $CGroup . "',
    '" . $CComments . "',
    '" . $CDateOFBIrth . "',
    '" . $P1FirstName . "',
    '" . $P1LastName . "',
    '" . $P1PhoneNum . "',
    '" . $P2FirstName . "',
    '" . $P2LastName . "',
    '" . $P2PhoneNum . "',
    '" . $CReading . "',
    '" . $CCounting . "',
    '" . $CSelfPlaying . "'
    )";
$result = $conn->query($insert_sql);

$insert_sql_A = "INSERT INTO attending (Cid) VALUES(
    '" . $Cid . "'
    )";
$result = $conn->query($insert_sql_A);

echo "<script>location.href='ChildrensFoldars.php'</script>";


?>