<?php
	// create db connection
	require_once('config/database.php');

	$search_key = $_POST['search_key'];
	$category_id = $_POST['category_id'];

	if ($category_id != '0') {
		$query = mysqli_query($mysqli, "SELECT * FROM menus LEFT JOIN menu_categories ON menu_categories.category_id = menus.category_id WHERE menu_name LIKE '%$search_key%' AND menu_categories.category_id=$category_id");
	} else {
		$query = mysqli_query($mysqli, "SELECT * FROM menus LEFT JOIN menu_categories ON menu_categories.category_id = menus.category_id WHERE menu_name LIKE '%$search_key%'");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Search Menus</title>

	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h4>Menus</h4>
				<a href="index.php"><button class="btn btn-warning btn-sm">Back</button></a>
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
					while ($menu = mysqli_fetch_array($query)) {
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