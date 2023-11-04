<?php 
if($_SERVER["REQUEST_METHOD"]== "POST"){
  $login = false;
  $showError = false;
  require 'partials/dbconnect.php';
  $username = $_POST["username"];
  $password = $_POST["password"];  




  $sql="Select * from users where username='$username' AND password='$password'"; 
  $result = mysqli_query($conn,$sql);
  $num = mysqli_num_rows($result);
  if($num == 1){
    $login = true;
    session_start();
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username;
    header("location: data.php");
  }

 
 else{
  $showError = "Invalid Credentials";

 }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    
</style>
</head>
<body>
<?php require 'partials/_nav.php' ?>
<?php
if($login=true){
echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> You are logged in.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
';
}
if($showError=true){
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error!</strong> '.$showError .'
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  ';
  }
?>
    
     <form action="/SSIP/login.php" method="post">
  <div class="mb-3 mx-3 my-3 col-md-6">
    <label for="username" class="form-label">username</label>
    <input type="text" class="form-control" name="username" id="username" aria-describedby="emailHelp" required>
  
  </div>
  <div class="mb-3 mx-3 my-3 col-md-6">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" name="password" id="password1" required>
  </div>
  
  
  <button type="submit" class="btn btn-primary mx-3 my-3">Login</button> 
</form>
<?php require 'partials/footer.php' ?>
</body>
</html>