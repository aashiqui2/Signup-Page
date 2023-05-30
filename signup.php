<?php

$sucess=0;
$user=0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'connect.php';

    $username = $_POST['name'];
    $password = $_POST['pass'];
    // $sql="insert into registration(username,password) values('$username','$password');";
    // $result=mysqli_query($conn,$sql);
    // if($result){
    //     echo "sucessfully inserted";
    // }
    // else{
    //     die(mysqli_error($conn));
    // }
    $sql = "select * from registration where username='$username'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            // echo "User already Exists";
            $user=1;
        } else {
            $sql = "insert into registration(username,password) values('$username','$password');";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                // echo "Signup Successfull ";
                $sucess=1;
                header("location:login.php");
            } else {
                die(mysqli_error($conn));
            }
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

    <title>Signup Page</title>
</head>

<body>
<?php  

if($user){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Ohh no Sorry</strong> User already exist
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
}

?>

<?php  

if($sucess){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Sucess </strong>You are Sucessfully Signed Up!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
}

?>


    <h1 class="text-center text-primary mt-3">Signup Page</h1>
    <div class="container mt-5">
        <form action="signup.php" method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" class="form-control" placeholder="Enter your username" name="name" autocomplete="off">

            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="text" class="form-control" placeholder="Enter your password" name="pass" autocomplete="off">
            </div>

            <button type="submit" class="btn btn-primary w-100">Signup</button>
        </form>
    </div>


</body>

</html>