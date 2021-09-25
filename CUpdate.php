
    <?php

    include "connect.php";

    if (isset($_GET['Cid'])) {

        $Cid = $_GET['Cid'];
        $CFirstName = $_GET["CFirstName"];
        $CLastName = $_GET["CLastName"];
        $CGender = $_GET["CGender"];
        $CAddress = $_GET["CAddress"];
        $CGroup = $_GET["CGroup"];
        $CComments = $_GET["CComments"];
        $CDateOFBIrth = $_GET["CDateOFBIrth"];
        $P1FirstName = $_GET["P1FirstName"];
        $P1LastName = $_GET["P1LastName"];
        $P1PhoneNum = $_GET["P1PhoneNum"];
        $P2FirstName = $_GET["P2FirstName"];
        $P2LastName = $_GET["P2LastName"];
        $P2PhoneNum = $_GET["P2PhoneNum"];
        $CReading = $_GET["CReading"];
        $CCounting = $_GET["CCounting"];
        $CSelfPlaying = $_GET["CSelfPlaying"];


        $sql = "UPDATE `children` SET `Cid`='$Cid', `CFirstName`='$CFirstName', `CLastName`='$CLastName', `CGender`='$CGender', `CAddress`='$CAddress', `CGroup`='$CGroup', `CComments`='$CComments', `CDateOFBIrth`='$CDateOFBIrth',`P1FirstName`='$P1FirstName', `P1LastName`='$P1LastName', `P1PhoneNum`='$P1PhoneNum',`P2FirstName`='$P2FirstName', `P2LastName`='$P2LastName', `P2PhoneNum`='$P2PhoneNum', `CReading`='$CReading', `CCounting`='$CCounting', `CSelfPlaying`='$CSelfPlaying' WHERE `Cid` = '$Cid'";

        $result = $conn->query($sql);
    
       echo "<script>location.href='childrenList.php'</script>";
    }

    ?>