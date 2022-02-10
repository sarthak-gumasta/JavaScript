<?php
    $login = false;
    $showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
include 'partial/_dbconnection.php';
$username = $_POST['username'];
$password = $_POST['password'];
$sql = "Select * from user where username='$username' AND password='$password'";
$result = mysqli_query($conn, $sql);
$num = mysqli_num_rows($result);
if($num  == 1){
    $login = true;
    session_start();
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username;
    header("location: welcome.php");
}else{
    $showError = "Wrong credentials";
}
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Login!</title>
  </head>
  <body>
      <?php require 'partial/_navbar.php' ?>

    <?php
if($login){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>success!</strong> You are login successfully.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
if($showError){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>not match!</strong>'. $showError.'
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
    ?>
		<div class="container my-4">
			<h1 class="text-center">Login</h1>
			<form action="/loginsystem/login.php" method="post">
				<div class="mb-3 col-md-6">
					<label for="username" class="form-label">Username</label>
					<input
						type="text"
						class="form-control"
						id="username"
						name="username"
						aria-describedby="emailHelp"
					/>
				</div>
				<div class="mb-3 col-md-6">
					<label for="password" class="form-label">Password</label>
					<input
						type="password"
						class="form-control"
						id="password"
						name="password"
					/>
				</div>
				<button type="submit" class="btn btn-primary">Login</button>
			</form>
		</div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>