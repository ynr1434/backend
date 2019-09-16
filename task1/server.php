<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'yernar');
	$name = "";
	$surname = "";
	$email = "";
	$id = 0;
	$update = false;
	if (isset($_POST['save'])) {
		$name = $_POST['name'];
		$surname = $_POST['surname'];
		$email = $_POST['email'];
		mysqli_query($db, "INSERT INTO table1 (name, surname, email) VALUES ('$name', '$surname', '$email')"); 
		$_SESSION['message'] = "Information saved"; 
		header('location: index.php');
	}
	if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$name = $_POST['name'];
	$surname = $_POST['surname'];
	$email = $_POST['email'];
	mysqli_query($db, "UPDATE table1 SET name='$name', surname='$surname', email='$email' WHERE id=$id");
	$_SESSION['message'] = "Information updated!"; 
	header('location: index.php');
}
	if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM table1 WHERE id=$id");
	$_SESSION['message'] = "Information deleted!"; 
	header('location: index.php');
}
?>

