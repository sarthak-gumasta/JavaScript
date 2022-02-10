<?php
    $showalert = false;
    $showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
include 'partial/_dbconnection.php';
$username = $_POST['username'];
$password = $_POST['password'];
$cpassword = $_POST['cnfpass'];
$existsql = "Select * from user where username='$username'";
$result = mysqli_query($conn, $existsql);
$numexist = mysqli_num_rows($result);
if($numexist > 0){
$showError = "Username already exist";
}else{


if(($password == $cpassword)){
$sql = "INSERT INTO `user` ( `username`, `password`, `dt`) VALUES ('$username', '$password', current_timestamp())";
$result = mysqli_query($conn, $sql);
if($result){
    $showalert = true;
}
}else{
    $showError = "Password didn't match";
}
}
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />

		<!-- Bootstrap CSS -->
		<link
			href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
			rel="stylesheet"
			integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
			crossorigin="anonymous"
		/>

		<title>Sign up</title>
	</head>
	<body>
		<?php
      require 'partial/_navbar.php'
      ?>
      <?php
if($showalert){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>success!</strong> you created your account and now you can login.
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
			<h1 class="text-center">Sign up</h1>
			<form action="/loginsystem/signup.php" method="post">
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
				<div class="mb-3 col-md-6">
					<label for="cnfpass" class="form-label">Confirm Password</label>
					<input
						type="password"
						class="form-control"
						id="cnfpass"
						name="cnfpass"
					/>
					<div id="emailHelp" class="form-text">
						Please enter the same password.
					</div>
				</div>
				<button type="submit" class="btn btn-primary">SignUp</button>
			</form>
		</div>

		<script
			src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
			integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
			crossorigin="anonymous"
		></script>
	</body>
</html>
