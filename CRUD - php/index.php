<?php  include('server.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>CRUD: Create, Update, Delete PHP MySQL</title>
</head>
<body>

<?php 
//Read in CRUD - fetching the details form db
$results = mysqli_query($conn, "SELECT * FROM data_table "); ?>

		<table>
			<thead>
				<tr>
					<th>Name</th>
					<th>Address</th>
					<th colspan="2">Action</th>
				</tr>
			</thead>
			
			<?php while ($row = mysqli_fetch_array($results)) { ?>
				<tr>
					<td><?php echo $row['name']; ?></td>
					<td><?php echo $row['address']; ?></td>
					<td>
						<a href="index.php?update=<?php echo $row['id']; ?>" class="update_btn" >Update</a>
					</td>
					<td>
						<a href="server.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
					</td>
				</tr>
			<?php } ?>
		</table>

		<br/><br/>

<?php 

	//the form gets changed if user wants to update any particular record
	//so that the data is fetched for that record and we update there it self
	if(isset($_GET['update'])){
		$id = $_GET['update'];  
		
		$result = mysqli_query($conn, "SELECT * FROM data_table WHERE id='$id' "); 
		$row = mysqli_fetch_array($result) ?>

	<form method="post" action="server.php" >
		<input type="hidden" name="id" value="<?php echo $id; ?>" >
		<div class="input-group">
			<label>Name</label>
			<input type="text" name="name" value="<?php echo $row['name']; ?>">
		</div>
		<div class="input-group">
			<label>Address</label>
			<input type="text" name="address" value="<?php echo $row['address']; ?>">
		</div>
		<div class="input-group">
			<button class="btn" type="submit" name="update" >update</button>
		</div>

	</form>

	<?php
	}

	else{
	//if user does not want to update insted want to create new. the form is changed with below
		?>

	<form method="post" action="server.php" >
		<div class="input-group">
			<label>Name</label>
			<input type="text" name="name" value="">
		</div>
		<div class="input-group">
			<label>Address</label>
			<input type="text" name="address" value="">
		</div>
		<div class="input-group">
			<button class="btn" type="submit" name="save" >Save</button>
		</div>

	</form>

	<?php 
	} ?>
</body>
</html>