<?php $page = 'Admin | Add Thumbnail'; ?>
<?php require_once('../config.php'); ?>
<?php
$name = '';
if (isset($_GET['thumbnail_name'])) {
	$name = $_GET['thumbnail_name'];
}
// Initialize message variable
$msg = "";

// If upload button is clicked ...
if (isset($_POST['add-thumbnail'])) {
	// Get image name
	$image = $_FILES['image']['name'];
	// Get text
	$image_text = mysqli_real_escape_string($connection, $_POST['image_text']);

	// image file directory
	$target = "../static/images/" . basename($image);

	$sql = "INSERT INTO images (image, image_text) VALUES ('$image', '$image_text')";
	// execute query
	mysqli_query($connection, $sql);

	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
		$msg = "Image uploaded successfully";
		$_SESSION['message'] = "Thumbnail added";
		header('location: ./post-manage.php');
	} else {
		$msg = "Failed to upload image";
	}

}
if (isset($_POST['update-thumbnail'])) {
	// Get image name
	$image = $_FILES['image']['name'];
	// Get text
	$image_text = mysqli_real_escape_string($connection, $_POST['image_text']);

	// image file directory
	$target = "../static/images/" . basename($image);

	$sql = "UPDATE images SET image='$image' WHERE image_text='$image_text'";
	// execute query
	mysqli_query($connection, $sql);

	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
		$msg = "Image uploaded successfully";
		$_SESSION['message'] = "Thumbnail updated";
		header('location: ./post-manage.php');
	} else {
		$msg = "Failed to upload image";
	}

}
?>
<?php require_once(ROOT_PATH . '/admin/includes/head_section.php') ?>
<!-- ================================= END HEAD SECTION ================================= -->
<?php include(ROOT_PATH . '/admin/includes/navbar.php'); ?>
<!-- ================================= END NAVIGATION BAR ================================= -->

<section class="form__section">
	<div class="container form__section-container">
		<form method="POST" action="thumbnail.php" enctype="multipart/form-data">
			<input type="hidden" name="size" value="1000000">
			<div>
				<input type="text" name="image_text" id="image_text" value="<?php print_r($name) ?>">
			</div>
			<div>
				<input type="file" name="image">
			</div>
			<div class="form__control inline">
				<button type="submit" name="add-thumbnail" class="btn">Add Thumbnail</button>
				<button type="submit" name="update-thumbnail" class="btn">Update Thumbnail</button>
			</div>
		</form>
	</div>
</section>
<!-- ================================= END THUMBNAIL ADD FORM ================================= -->
<?php include(ROOT_PATH . '/admin/includes/footer.php'); ?>
<!-- ================================= END FOOTER ================================= -->