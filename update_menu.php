<?php
	//create db connection
	include_once("config/database.php");

	$optCategories = mysqli_query($mysqli, "SELECT * FROM menu_categories");

	$id = $_GET['id'];

	$queryGet = mysqli_query($mysqli, "SELECT * FROM menus WHERE menu_id=$id");

	while ($menu = mysqli_fetch_array($queryGet)) {
		$menu_name = $menu['menu_name'];
		$menu_desc = $menu['menu_desc'];
		$price = $menu['price'];
		$release_date = $menu['release_date'];
		$category_id_selected = $menu['category_id'];
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Menu</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h4>Edit Menu</h4>
				<hr>
				
				<form action="update_menu.php" method="post">
					<div class="form-group">
						<label>Name</label>
						<input class="form-control" type="hidden" name="id" value="<?php echo $id ?>">
						<input class="form-control" type="text" name="menu_name" value="<?php echo $menu_name ?>">
					</div>
					<div class="form-group">
						<label>Description</label>
						<textarea class="form-control" name="menu_desc"><?php echo $menu_desc ?></textarea> 
					</div>
					<div class="form-group">
						<label>Price</label>
						<input class="form-control" type="number" name="price" value="<?php echo $price ?>">
					</div>
					<div class="form-group">
						<label>Category</label><?php echo $category_id_selected."<br>"; ?>
						<select name="category_id" class="form-control">
							<?php
								while ($opt = mysqli_fetch_array($optCategories)) {
									if($opt['category_id']==$category_id_selected) {
										echo "<option selected='selected' value='".$opt['category_id']."'>".$opt['category_name']."</option>";
									} else {
										echo "<option value='".$opt['category_id']."'>".$opt['category_name']."</option>";
									}
								}
							?>
						</select>
					</div>
					<div class="form-group">
						<label>Release Date</label>
						<input class="form-control" type="date" name="release_date" value="<?php echo $release_date ?>">
					</div>

					<input type="submit" name="submit" value="Update" class="btn btn-info btn-sm">

				</form>
				<?php
					if (isset($_POST['submit'])) {
						$menu_name = $_POST['menu_name'];
						$menu_desc = $_POST['menu_desc'];
						$price = $_POST['price'];
						$release_date = $_POST['release_date'];
						$category_id = $_POST['category_id'];

						$id = $_POST['id'];

						// update to DB
						$query = mysqli_query($mysqli, "UPDATE menus SET menu_name='$menu_name', menu_desc='$menu_desc', price=$price, release_date='$release_date', category_id=$category_id WHERE menu_id=$id");

						if (!$query) {
							header('Location: update_menu.php?id='.$id);
						} else {
							//echo "<script type='text/javascript'>alert('Menu successfully updated.');
							//	window.location.href = 'index.php';</script>";
							header('Location: index.php');
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