<?php
	//create db connection
	include_once("config/database.php");

	$optCategories = mysqli_query($mysqli, "SELECT * FROM menu_categories");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Create New Menu</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h4>Create New Menu</h4>
				<hr>
				
				<form action="create_menu.php" method="post">
					<div class="form-group">
						<label>Name</label>
						<input class="form-control" type="text" name="menu_name">
					</div>
					<div class="form-group">
						<label>Description</label>
						<textarea class="form-control" name="menu_desc"></textarea> 
					</div>
					<div class="form-group">
						<label>Price</label>
						<input class="form-control" type="number" name="price">
					</div>
					<div class="form-group">
						<label>Category</label>
						<select name="category_id" class="form-control">
							<?php
								while ($opt = mysqli_fetch_array($optCategories)) {
									echo "<option value='".$opt['category_id']."'>".$opt['category_name']."</option>";
								}
							?>
						</select>
					</div>
					<div class="form-group">
						<label>Release Date</label>
						<input class="form-control" type="date" name="release_date">
					</div>

					<input type="submit" name="submit" value="Submit" class="btn btn-info btn-sm">

				</form>

				<?php
				if (isset($_POST['submit'])) {
					$menu_name = $_POST['menu_name'];
					$menu_desc = $_POST['menu_desc'];
					$price = $_POST['price'];
					$release_date = $_POST['release_date'];
					$category_id = $_POST['category_id'];

					// insert to DB
					$query = mysqli_query($mysqli, "INSERT INTO menus (menu_name, menu_desc, price, release_date, category_id) VALUES ('$menu_name', '$menu_desc', $price, '$release_date', $category_id)");

					if (!$query) {
						echo "Menu failed to add.";
					} else {
						echo "Menu successfully added. <a href='index.php'>Check menu</a>";
					}
				}
				?>

				<hr>
				
				<a href="index.php"><button class="btn btn-warning btn-sm">Back</button></a>
			
			</div>
		</div>
	</div>

</body>
</html>