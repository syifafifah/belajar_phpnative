<?php
	// create database connection
	include_once("config/database.php");

	// get menus
	$result = mysqli_query($mysqli, "SELECT * FROM menus LEFT JOIN menu_categories ON menu_categories.category_id = menus.category_id");

	$optCategories = mysqli_query($mysqli, "SELECT * FROM menu_categories");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Menus</title>

	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h4>Menus</h4>
				<a href="create_menu.php"><button class="btn btn-info btn-sm">+ Add New Menu</button></a>
				
				<hr>
					<form action="search_menu.php" method="post">
						<div class="form-group row">
							<label class="col-md-1">Search:</label>
							<div class="col-md-2">
								<select class="form-control" name="category_id">
									<option value="0">All Categories</option>
									<?php
										while ($opt = mysqli_fetch_array($optCategories)) {
											echo "<option value='".$opt['category_id']."'>".$opt['category_name']."</option>";
										}
									?>
								</select>
							</div>
							<div class="col-md-3">
								<input type="text" name="search_key" class="form-control" placeholder="Menu name">
							</div>
							<div class="col-md-1"> 
								<input type="submit" name="search" value="Search" class="btn btn-warning">
							</div>
						</div>
					</form>
				<hr>

				<table class="table">
					<tr>
						<td>No.</td>
						<td>Menu Name</td>
						<td>Description</td>
						<td>Category</td>
						<td>Price</td>
						<td>Action</td>
					</tr>
					<?php
					$i=1;
					while ($menu = mysqli_fetch_array($result)) {
						echo "<tr>";
							echo "<td>".$i++."</td>";
							echo "<td>".$menu['menu_name']."</td>";
							echo "<td>".$menu['menu_desc']."</td>";
							echo "<td>".$menu['category_name']."</td>";
							echo "<td>".$menu['price']."</td>";
							echo "<td><a href='update_menu.php?id=".$menu['menu_id']."'>Edit</a> | 
							<a href='delete_menu.php?id=".$menu['menu_id']."' onclick=\"return confirm('Are you sure you want to delete this item?');\">Delete</a></td>";
						echo "</tr>";
					}
					?>
				</table>

			</div>

		</div>
	</div>
</body>
</html>