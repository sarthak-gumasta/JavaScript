<?php
$insert = false;
$update = false;
$delete = false;
$servername = "localhost"; 
$username ="root"; 
$password =""; 
$database="notes";
$conn = mysqli_connect($servername, $username, $password, $database); 
if(!$conn) 
{ die("Sorry we failed to connect: ". mysqli_connect_error()); 
}
if(isset($_GET['delete'])){
	$sno = $_GET['delete'];
	$sql =  "DELETE FROM `notes` WHERE `notes`.`sno` = $sno";
	$result = mysqli_query($conn, $sql);
	if($result){
		$delete = true;
	}

}
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	if (isset( $_POST['snoEdit'])){
		//update the record
		$sno = $_POST["snoEdit"];
		$title = $_POST["titleEdit"];
        $description = $_POST["descEdit"];

// SQL query to be executed
$sql = "UPDATE `notes` SET `title` = '$title', `description` = '$description' WHERE `notes`.`sno` = $sno";
$result = mysqli_query($conn, $sql);
if($result){
	$update = true;
}
}
else{
	$title = $_POST["title"];
	$description = $_POST["desc"];
		
		// SQL query to be executed
	$sql = "INSERT INTO `notes` (`title`, `description`) VALUES ('$title', '$description')";
	$result = mysqli_query($conn, $sql);
	if($result){
		$insert = true;
	}
}
}
?> 
