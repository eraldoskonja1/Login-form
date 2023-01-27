<?php
include "db_conn.php";
$id = $GET ['id'];

if(isset($_POST['submit'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "UPDATE `crud` SET`first_name`='$first_name',`last_name`='$last_name',`email`='$email',`password`='$password' WHERE id=$id";


    $result = mysqli_query($conn, $sql);

    if($result) {
        header("Location: index.php?msg=Data updated successfully");
    }
    else {
        echo "Failed: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Php Crud</title>
    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" 
    integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

    <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573;">
        Php Complete CRUD Application
    </nav>

    <div class="container">
        <div class="text-center mb-4">
            <h3>Edit User Information</h3>
            <p class="text-muted">Click update after changing any information</p>
        </div>

        <?php 
             $id = $_GET['id'];
             $sql = "SELECT * FROM `crud` WHERE id = $id LIMIT 1";
             $result = mysqli_query($conn, $sql);
             $row = mysqli_fetch_assoc($result);

             ?>

        <div class="container d-flex justify-content-center">
            <form action="" method="post" style="width: 50vw; min-width: 300px">
               <div class="row mb-3">

                  <div class="col">
                    <div class="form-label">First Name:</div>
                    <input type="text" class="form-control" name="first_name" placeholder="Your name" value="<?php echo $row['first_name'] ?>">
                  </div>
                
                  <div class="col">
                    <div class="form-label">Last Name:</div>
                    <input type="text" class="form-control" name="last_name" placeholder="Your last name" value="<?php echo $row['last_name'] ?>">
                  </div>

                  <div class="mb-3">
                    <div class="form-label">Email:</div>
                    <input type="text" class="form-control" name="email" placeholder="Your email" value="<?php echo $row['email'] ?>">
                  </div>

                  <div class="mb-3">
                    <div class="form-label">Passord</div>
                    <input type="password" class="form-control" name="password" placeholder="Your password" value="<?php echo $row['password'] ?>">
                  </div>
                
                

               <div>
                  <button class="btn btn-success" type="submit" name="submit">Update</button>
                  <a href="index.php" class="btn btn-danger">Cancel</a>
               </div>
            </form>
        </div>
    </div>
   

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>