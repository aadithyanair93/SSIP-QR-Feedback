<?php 
if($_SERVER["REQUEST_METHOD"]== "POST"){
  $showAlert = false;
  $showError = false;
  require 'partials/dbconnect.php';
  $username = $_POST["username"];
  $password = $_POST["password"];  
  $cpassword = $_POST["cpassword"];
  // $exists = false;  
  // check whether this username exists
$existsql = "SELECT * FROM `users` WHERE username = '$username'";
$result = mysqli_query($conn,$existsql);
$numExistrows =   mysqli_num_rows($result);
if($numExistrows>0){
  // $exists= true;
  $showError = " username already exists.";
}
else{
  $exists = false;
  if(($password == $cpassword)){
    $sql="INSERT INTO `users` ( `username`, `password`, `dt`) VALUES ( '$username', '$password', current_timestamp())"; 
    $result = mysqli_query($conn,$sql);
    if($result){
      $showAlert = true;
    }
  
   }
   else{
    $showError = "Passwords do not match.";
  
   }
}
 

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
</head>
<body>
<?php require 'partials/_nav.php' ?>
<?php
if($showAlert){
echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> Your account is created & you can proceed to login.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
';
}
if($showError){
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error!</strong> '.$showError .' Your account is created & you can proceed to login.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  ';
  }
?>
    <div class="container flex" >
        <h1 class="text-center">Sign up to our website</h1>
    </div>
    <form action="/Login System/signup.php" method="post">
  <div class="mb-3 mx-3 my-3 col-md-6">
    <label for="username" class="form-label">username</label>
    <input type="text" class="form-control" name="username" id="username" aria-describedby="emailHelp">
  
  </div>
  <div class="mb-3 mx-3 my-3 col-md-6">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" name="password" id="password1">
  </div>
  <div class="mb-3 mx-3 my-3 col-md-6"">
    <label for="cpassword" class="form-label">Confirm Password</label>
    <input type="password" class="form-control" name="cpassword" id="cpassword">
    <div id="emailHelp" class="form-text">Make Sure to enter same password.</div>
  </div>
  
  <button type="submit" class="btn btn-primary mx-3 my-3">Sign Up</button>
</form>
<?php require 'partials/footer.php' ?>
</body>
</html>