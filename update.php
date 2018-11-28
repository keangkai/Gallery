<?php include 'includes/db.inc.php';

$id = (int) $_GET['id'];

$sql = "SELECT * FROM gallery WHERE id='$id'";

$rows = $con->query($sql);

$row = $rows->fetch();

if (isset($_POST['send'])) {
	$imageName = $_FILES['image']['name'];
	$name = htmlspecialchars($_POST['task']);
	$description = htmlspecialchars($_POST['description']);

	if (!empty($imageName)) {
		$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
	}
	if (empty($name) || empty($description)) {
		echo "<script>alert('Title and Description can\'t be empty'); location=location</script>";
	}
	else {

		if (empty($imageName)) {
			$sql = "UPDATE gallery SET name=:name,Description=:description WHERE id=:id";
			$stmt = $con->prepare($sql);
			$stmt->bindParam(':name', $name);
			$stmt->bindParam(':description', $description);
			$stmt->bindParam(':id', $id);
			$stmt->execute();
		} else {
			$sql = "UPDATE gallery SET name=:name,image='$image',Description=:description WHERE id=:id";
			$stmt = $con->prepare($sql);
			$stmt->bindParam(':name', $name);
			$stmt->bindParam(':description', $description);
			$stmt->bindParam(':id', $id);
			$stmt->execute();
		}

		
		header('location: admin.php');
		exit();

	}
}

?>
<!DOCTYPE html>
<html>
	<head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<title>Crud App</title>
	</head>
	<body>
	<div class="bg-img">
		<div class="container">
			<center><h1>Update</h1></center>
				
		    	<div class="row" style="margin-top: 70px;">
			    	<div class="col-md-10 col-md-offset-1" >
				    	<table class="table">

					     	<hr><br>
								<form method="post" enctype="multipart/form-data" >
									<div class="form-group">
										<label>Title</label>
										<input type="text" required name="task" value="<?php echo $row['name']; ?>" class="form-control">
                                        <br>
                                        <label>image</label>
                                        <input type="file" name="image">
										<label for="comment">Description:</label>
										<textarea class="form-control" rows="5" name="description" id="comment" ><?php echo $row["Description"]; ?></textarea>
									</div>
									 <input type="submit" name="send" value="Add" class="btn btn-success">&nbsp;
								 <a href="admin.php" class="btn btn-warning">Back</a>
							</form>
				    	</div>
			 	  </div>
			 </div>
			</div>
		 </body>
	</html>