<?php
include "db_conn.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>walkin</title>
</head>

<body>
  <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573;">
  </nav>

  <div class="container">
    <?php
    if (isset($_GET["msg"])) {
      $msg = $_GET["msg"];
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
      ' . $msg . '
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    ?>
  <h1 class="text-center">LIST OF BOOK APPOINTMENTS</h1>

    <table class="table table-hover text-center">
      <thead class="table-primary">
        <tr>
        <th scope="col">ID</th>
        <th scope="col">Fullname</th>
        <th scope="col">E-mail</th>
        <th scope="col">Mobile</th>
        <th scope="col">Date</th>
        <th scope="col">Message</th>
		    <th scope="col">Username</th>
		    <th scope="col">Status</th>
        <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM `req_form`";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
          <tr>
            <td><?php echo $row["id"] ?></td>
            <td><?php echo $row["full_name"] ?></td>
            <td><?php echo $row["email"] ?></td>
			      <td><?php echo $row["mobile"] ?></td>
            <td><?php echo $row["date"] ?></td>
            <td><?php echo $row["message"] ?></td>
			      <td><?php echo $row["user_name"] ?></td>
            <td><?php echo $row["status"] ?></td>
            <td>
              <a href="edit.php?id=<?php echo $row["id"] ?>" class="link-dark "><i class="fa-solid fa-pen-to-square fs-5 me-3 float-start">Edit</i></a>
              <a href="delete.php?id=<?php echo $row["id"] ?>" class="link-dark "><i class="fa-solid fa-trash fs-5 float-end"></i>Delete</a>
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>
  </script>
          <button name="back" id= "back" type="submit" class="btn btn-primary rounded-0 btn-block">Back</button>
            <script>
    document.getElementById("back").addEventListener("click", function() {
      window.open("users.php", "_blank");
    });
  </script>        

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>
