

  <?php

    include "connect.php";

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

    
    $EDate = date("Y-m-d");
    $SDate = date("Y-m-d", strtotime('-1 months', strtotime($EDate)));
    $dates = createRange($SDate, $EDate);

    $results = array(
        array([], [], [], [])
    );

    $results[0][2] = "hey";
    $try = "hoy";
    $results[0][2] .= " $try";

    echo $results[0][2];



    if (isset($_POST['Update'])) {

        //יצירת מערך תוצאות
        //array([Cid], [Dates], [Retult])

        $results = array(
            array([], [], [])
        );

        $DateToEdit = strval($_POST['DateToEdit']);
        for ($i = 0; $i <= sizeof($_POST['Cids']) - 1; $i++) {
            $DateStatus = $_POST['CurrentPicks'][$i];
            $value = $_POST['Cids'][$i];
            echo $value;
            $results[$i][0] = $value; //השמת ת.ז ברשימת התוצאות
            $sql3 = ("UPDATE `attending` SET `$DateToEdit`='$DateStatus' WHERE `Cid`='$value'");
            $result = $conn->query($sql3);

            if ($DateStatus != "Not entered") {

                $Cid = $value;


                $strDates = array();
                $SArrive = 0;
                $SNotArrive = 0;
                $DayReported = 0;

                //הוצאת שם פרטי ומשפחה
                //$sql1 = "SELECT * FROM `children` WHERE `Cid`='$Cid'";
                // $result1 = $conn->query($sql1);
                // if ($result1->num_rows > 0) {
                //      while ($row = $result1->fetch_assoc()) {
                //          $CFName = $row['CFirstName'];
                //           $CLName = $row['CLastName'];
                //      }
                //  }

                foreach ($dates as $date) {
                    $dateToExist = strval($date);

                    if ($result = $conn->query("SELECT `$dateToExist` FROM `attending` WHERE `Cid`='$Cid'")) {
                        $DayReported = $DayReported + 1;
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $status = $row["$dateToExist"];

                                if ($status == 'Arrive') {
                                    $SArrive = $SArrive + 1;
                                }
                                if ($status == 'Not arrive') {
                                    $SNotArrive = $SNotArrive + 1;
                                    $results[$i][1] .= " $dateToExist";
                                }
                            }
                        }
                    }
                }

                if ($SArrive == 0 && $SNotArrive == 0) {
                } else {
                    $arrivePerCent = $SArrive / ($SArrive + $SNotArrive);
                    $NotarrivePerCent = $SNotArrive / ($SArrive + $SNotArrive);
                    $arrivePerCent = round($arrivePerCent * 100);
                    $results[$i][2] = $NotarrivePerCent = round($NotarrivePerCent * 100);
                    $results[$i][3] = $SArrive + $SNotArrive;
                }
            }
        }
        
        //בדיקה האם להעביר מיד לדף הנוכחות [אמת] או להציג את ההתראות
        $Alert = true;

        print_r($results);

        for ($i = 0; $i <= sizeof($_POST['Cids']) - 1; $i++) {

            if ($results[$i][2] > 50 &&  $results[$i][3] > 10) {
                $Alert = false;
                $OutPutCid = $results[$i][0];
                $sql1 = "SELECT * FROM `children` WHERE `Cid`='$OutPutCid'";
                $result1 = $conn->query($sql1);
                if ($result1->num_rows > 0) {
                    while ($row = $result1->fetch_assoc()) {
                        $COFName = $row['CFirstName'];
                        $COLName = $row['CLastName'];
                    }
                }

                echo "Name " . $COFName . " " . $COLName . "Absent renk" . $results[$i][2] . "days of absent :" . $results[$i][2];
            }
        }

        if ($Alert == false) {

            //כפתור חזרה

        } else {

            //echo "<script>location.href='Attendance.html'</script>";
        }
    }
    ?>