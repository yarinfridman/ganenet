
    <?php

include "connect.php";

if (isset($_GET['Cid'])) {

    $Cid = $_GET['Cid'];
   
    $sql = "DELETE FROM `children` WHERE `Cid` = '$Cid'";

    $result = $conn->query($sql);
    
    $sqlA = "DELETE FROM `attending` WHERE `Cid` = '$Cid'";

    $result = $conn->query($sqlA);
    
    echo "<script>location.href='childrenList.php'</script>";
}

?>