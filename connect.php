<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>Childrens Foldars</title>

</head>

<body>

 
    <?php
    $host = "localhost";
    $user = "roeysh_user";
    $pass = "12345";
    $db = "roeysh_ganenet";

    //create connection
    $conn = new mysqli($host, $user, $pass, $db);
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    echo "Connection successful";
    ?>
  

</body>

</html>