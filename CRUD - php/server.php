<?php
    require_once('./connect.php');
	
	// initializing variables
	$name = "";
	$address = "";
	$id = 0;

    #create in CRUD  - if data sent to save in table
	if (isset($_POST['save'])) {

		$name = $_POST['name'];
		$address = $_POST['address'];

        $sql = " INSERT INTO data_table (name, address) VALUES ('$name', '$address') ";

		mysqli_query($conn, $sql); 

		header('location: index.php');
		//echo "data created..!";
	}


	#Delete in CRUD  - if id sent to delete in table
	if (isset($_GET['del'])){
		$id = $_GET['del'];

		$sql = " DELETE FROM data_table WHERE id='$id' ";

		mysqli_query($conn, $sql); 

		header('location: index.php');
		//echo "data deleted..!";
	}

	#Update in CRUD - if id and data is posted
	if(isset($_POST['update'])){
		$id = $_POST['id'];
		$name = $_POST['name'];
		$address = $_POST['address'];

		$sql = " UPDATE data_table SET name='$name', address='$address' WHERE id='$id' ";

		mysqli_query($conn, $sql); 

		header('location: index.php');
		//echo "data updated..!";
	}
	
?>