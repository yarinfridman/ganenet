<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>Children View</title>

</head>

<body>

  <?php require_once "connect.php";

  if (isset($_GET['Cid'])) {

    $childrenID = $_GET['Cid'];
    echo "GET succes";


    $sql = "SELECT * FROM `children` WHERE `Cid` = '$childrenID'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) { ?>

        <form action="CUpdate.php" method="GET">
          <h1 class="container text-center mb-4 mt-4">Childern Folder Creat:</h1>
          <main class="row container mx-auto">
            <!-- פרטים אישיים -->
            <section class="mb-4 mt-4">
              <div class="col-md-4 form-floating mb-3">
                <input type="text" value="<?php echo $row["CFirstName"] ?>" class="form-control" name="CFirstName" required>
                <label for="floatingInput">First name</label>
              </div>
              <div class="col-md-4 form-floating mb-3">
                <input type="text" value="<?php echo $row["CLastName"] ?>" class="form-control" name="CLastName" required>
                <label for="floatingInput">Last name</label>
              </div>
            </section>
            <section class="col-md-4">
              <div class="col">
                <div class="card mb-4 rounded-3 shadow-sm">
                  <div class="card-header py-3">
                    <h4 class="my-0 fw-normal">Pesonal info</h4>
                  </div>
                  <div class="card-body">
                    <h3 class="card-title pricing-card-title">ID</h3>
                    <ul class="list-unstyled mt-3 mb-4">
                      <li><input type="text" class="form-control" value="<?php echo $row["Cid"] ?>" name="Cid" readonly></li>
                    </ul>
                    <h3 class="card-title pricing-card-title">Date Of Birth</h3>
                    <ul class="list-unstyled mt-3 mb-4">
                      <li><input type="date" value="<?php echo $row["CDateOFBIrth"] ?>" class="form-control" name="CDateOFBIrth" required></li>
                    </ul>
                    <h3 class="card-title pricing-card-title">Gender</h3>
                    <?php
                    $selected = $row['CGender'];
                    ?>
                    <ul class="list-unstyled mt-3 mb-4">
                      <li><select class="form-select" aria-label="Default select example" name="CGender" required>
                          <option value="1" <?php if($selected == 'Male'){echo("selected");}?>>Male</option>
                          <option value="2" <?php if($selected == 'Female'){echo("selected");}?>>Female</option>
                        </select></li>
                    </ul>
                    <h3 class="card-title pricing-card-title">Address</h3>
                    <ul class="list-unstyled mt-3 mb-4">
                      <li><input type="text" class="form-control" value="<?php echo $row["CAddress"] ?>" name="CAddress" required></li>
                    </ul>
                    <h3 class="card-title pricing-card-title">Group</h3>
                    <?php
                    $selected = $row['CGroup'];
                    ?>
                    <ul class="list-unstyled mt-3 mb-4">
                      <li><select class="form-select" aria-label="Default select example" name="CGroup" value="<?php echo $row["CGroup"] ?>" required>
                          <option value="1" <?php if($selected == 'Young'){echo("selected");}?>>Young</option>
                          <option value="2" <?php if($selected == 'Mature'){echo("selected");}?>>Mature</option>
                        </select></li>
                    </ul>
                  </div>
                </div>
            </section>

            <section class="col-md-4">
              <!-- פרטי הורים -->
              <div class="card mb-4 rounded-3 shadow-sm">
                <div class="card-header py-3">
                  <h4 class="my-0 fw-normal">Parents info</h4>
                </div>
                <div class="card-body">
                  <h3 class="card-title pricing-card-title">Parent 1</h3>
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" value="<?php echo $row["P1FirstName"] ?>" name="P1FirstName" required>
                    <label for="floatingInput"> First Name</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" value="<?php echo $row["P1LastName"] ?>" name="P1LastName" required>
                    <label for="floatingInput"> Last Name</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" value="<?php echo $row["P1PhoneNum"] ?>" name="P1PhoneNum" required>
                    <label for="floatingInput"> Phone Number</label>
                  </div>
                  <h3 class="card-title pricing-card-title">
                    <h3 class="card-title pricing-card-title">Parent 2</h3>
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" value="<?php echo $row["P2FirstName"] ?>" name="P2FirstName">
                      <label for="floatingInput"> First Name</label>
                    </div>
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" value="<?php echo $row["P2LastName"] ?>" name="P2LastName">
                      <label for="floatingInput"> Last Name</label>
                    </div>
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" value="<?php echo $row["P2PhoneNum"] ?>" name="P2PhoneNum">
                      <label for="floatingInput"> Phone Number</label>
                    </div>
                </div>
              </div>

            </section>
            <section class="col-md-4">

              <!-- התרשמות -->
              <div class="card mb-4 rounded-3 shadow-sm">
                <div class="card-header py-3">
                  <h4 class="my-0 fw-normal">Imppression</h4>
                </div>
                <div class="card-body">
                  <ul class="list-unstyled mt-3 mb-4">
                    <li> <textarea class="form-control" name="CComments" rows="8"><?php echo $row["CComments"]?></textarea></li>
                  </ul>

                  <div>
                    <h3 class="card-title pricing-card-title">Reading</h3>
                    <?php
                    $selected = $row['CReading'];
                    ?>
                    <select class="form-select" aria-label="Default select example" name="CReading" value="<?php echo $row["CReading"] ?>" required>
                      <option value="1" <?php if($selected == 'Alone'){echo("selected");}?>>Alone</option>
                      <option value="2" <?php if($selected == 'With help'){echo("selected");}?>>With help</option>
                      <option value="3" <?php if($selected == 'Not performing'){echo("selected");}?>>Not performing</option>
                    </select>

                  </div>
                  <div>
                    <h3 class="card-title pricing-card-title">Counting</h3>
                    <?php
                    $selected = $row['CCounting'];
                    ?>
                    <select class="form-select" aria-label="Default select example" name="CCounting" value="<?php echo $row["CCounting"] ?>" required>
                    <option value="1" <?php if($selected == 'Alone'){echo("selected");}?>>Alone</option>
                      <option value="2" <?php if($selected == 'With help'){echo("selected");}?>>With help</option>
                      <option value="3" <?php if($selected == 'Not performing'){echo("selected");}?>>Not performing</option>
                    </select>
                  </div>
                  <div>
                    <h3 class="card-title pricing-card-title">Self playing</h3>
                    <?php
                    $selected = $row['CSelfPlaying'];
                    ?>
                    <select class="form-select" aria-label="Default select example" name="CSelfPlaying" value="<?php echo $row["CSelfPlaying"] ?>" required>
                    <option value="1" <?php if($selected == 'Alone'){echo("selected");}?>>Alone</option>
                      <option value="2" <?php if($selected == 'With help'){echo("selected");}?>>With help</option>
                      <option value="3" <?php if($selected == 'Not performing'){echo("selected");}?>>Not performing</option>
                    </select>
                  </div>

          </main>

          <section class="container mx-auto">
            <div class="mx-auto">
              <button type="submit" href="CUpdate.php?Cid=<?php echo $row['Cid']; ?>" class="btn btn-primary">Update</button>
          </section>

        </form>
  <?php
      }
    }
  }
  ?>

</body>



</html>