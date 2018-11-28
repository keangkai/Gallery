<!DOCTYPE html>
<?php include 'includes/db.inc.php';

$page = (isset($_GET['page']) ? $_GET['page'] : 1);
$perPage = (isset($_GET['per-page']) && ($_GET['per-page']) <= 50 ? $_GET['per-page'] : 5);
$start = ($page > 1) ? ($page * $perPage) - $perPage : 0;

$sql = "select * from gallery ORDER BY id DESC limit " . $start . " , " . $perPage;
$total = $con->query("select * from gallery")->fetchColumn();
$pages = ceil($total / $perPage);

$rows = $con->query($sql);

?>
<html>
<head>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"  crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="assets/css/bootstrap.min.css"  crossorigin="anonymous">
<link rel="stylesheet" href="assets/css/main.css?v2" />
<link rel="stylesheet" href="css/admin.css">
<title>Crud App</title>
</head>
<body>
<div class="bg-img">
<!--header-->
<div class="container">
<center><h1 style="font-size:3.5rem;color: #fff;text-shadow: 2px 2px #aaa;">Admin</h1></center>

<!--end header-->

<!-- slide -->

<!-- end slide -->
<div class="row" style="margin-top: 70px;">
	<div class="col-md-10 col-md-offset-1" >
		<table class="table">
			<button type="button" data-target="#myModal" data-toggle="modal" class="btn btn-primary">Add </button>
			<hr><br>
			<!-- Modal -->
			<div id="myModal" class="modal fade" role="dialog">
				<div class="modal-dialog">
					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
							<!-- <button type="button" class="button" data-dismiss="modal" style="float: right;">&times;</button> -->
							<h4 class="modal-title">Add</h4>

						</div>
						<div class="modal-body">
							<form method="post" action="add.php" enctype="multipart/form-data">
								<div class="form-group">
									<label>Title</label>
									<input type="text" required name="task" class="form-control">
									<label>Image</label>
									<input type="file" name="image">
									<label for="comment">Description:</label>
									<textarea class="form-control" rows="5" name="description" id="comment" required></textarea>
								</div>
								<input type="submit" name="send" value="Add" class="btn btn-success">
							</form>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
		<div class="col-md-12 text-center">
			<!-- <p>Search</p>
			<form action="search.php" method="post" class="form-group">

				<input type="text" placeholder="Search" name="search" class="form-control">
			</form> -->
		</div>
			<table class="table table-hover">
				<thead style="color:#fff">
					<tr>
						<th>ID.</th>
						<th>Title</th>
						<th>Description</th>
						<th>Image</th>
					</tr>
				</thead>
				<tbody style="color:#fff">
					<tr>
					<?php while ($row = $rows->fetch()): ?>
						<td><?php echo $row['id'] ?></td>
						<td><?php echo $row['name']; ?></td>
						<td class="col-md-2"><?php echo $row['Description'] ?> </td>
						<td><?php echo '<img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" width="200px"/>'; ?></td>
						<td><a href="update.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Edit</a> </td>
						<td><a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a> </td>
					</tr>
						<?php endwhile;?>

				</tbody>
			</table>
			<center>
				<ul class="pagination">
				<?php for ($i = 1; $i <= $pages; $i++): ?>
				<li><a href="?page=<?php echo $i; ?>&per-page=<?php echo $perPage; ?>" class="page"><?php echo $i; ?></a></li>
			<?php endfor;?>
				</ul>
			</center>

		<center>

		</div>
	</div>
</div>
</div>
<script>
                    // Replace the <textarea id="editor1"> with a CKEditor
                    // instance, using default configuration.
                    CKEDITOR.replace('comment');
                    function CKupdate() {
                        for (instance in CKEDITOR.instances)
                            CKEDITOR.instances[instance].updateElement();
                    }
                </script>
</body>
</html>