<?php

$Login=0;
$Invalid=0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'connect.php';

    $username = $_POST['name'];
    $password = $_POST['pass'];
    
    $sql = "select * from registration where username='$username' and password='$password'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            // echo "Login Successfull";
            $Login=1;
            session_start();
            $_SESSION['name']=$username;
            // $_SESSION['pass']=$password;
            header("location:welcome.php");
        } else {
            // echo "Invalid Data";
            $Invalid=1;
        }
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Login Page</title>
</head>

<body>
<?php  

if($Login){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Sucess</strong> You are sucessfully Logged in!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
}

?>

<?php  

if($Invalid){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Invalid </strong>Deatails are invalid Credentials!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
}

?>



    <h1 class="text-center text-primary mt-3">Login to our website</h1>
    <div class="container mt-5">
        <form action="login.php" method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" class="form-control" placeholder="Enter your username" name="name" autocomplete="off">

            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="text" class="form-control" placeholder="Enter your password" name="pass" autocomplete="off">
            </div>

            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
    </div>


</body>

</html>
