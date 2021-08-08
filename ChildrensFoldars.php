<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>Childrens Foldars</title>

</head>

<body>

</div>


  <h1>Childrens Foldars</h1>
  <div>

<?php
    require_once 'connect.php';

    $sql = "select * from children";
    $result = $conn->query($sql);
    //"sdasdas"."sadsadsa"
?>

<table class="table">
<tr>
  <th>Childrens Foldars</th>
  <th></th>
</tr>

</div>

<?php
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) { 
        if ($row["CFirstName"] != '') { ?>

        <tr>
          <td> <?php echo $row["CFirstName"] . "&nbsp; &nbsp;" . $row["CLastName"] ?> </td>
          <td> <a class="btn btn-info" href="CView.php?Cid=<?php echo $row['Cid']; ?>"> View </a> </td>
        </tr>
          
        <?php }
         
        }
      }
    ?>
</table>

<a class="btn btn-info" href="CCreat.html"> Creat </a>

</body>

</html>