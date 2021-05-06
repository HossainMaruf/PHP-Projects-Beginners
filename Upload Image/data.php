<?php 
	// Image Uploaded Logic Goes Here
	if(isset($_POST['submit'])) {
		// Form is submitted
		// print_r($_FILES);
		$name = $_FILES['photos']['name'];
		$type = $_FILES['photos']['type'];
		$tmp_name = $_FILES['photos']['tmp_name'];
		$size = $_FILES['photos']['size'];

		// Has Image or Not
		$has_image = ($name[0] == "")? 0 : 1;

		if(!file_exists('Uploaded Files')) mkdir('Uploaded Files');
		// So the directory is 'Uploaded Files'
		$dir = 'Uploaded Files';

		// Crate the image dimenstion array
		$width = []; $height = [];

		// Upload The Files Using ForEach
		if($has_image) {
			foreach($tmp_name as $key => $t_name) {
				array_push($width, getimagesize($tmp_name[$key])[0]);
				array_push($height, getimagesize($tmp_name[$key])[1]);
				move_uploaded_file($t_name, $dir.'/'.$name[$key]);
			}	
		}
	}
?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="./style/style.css">
		<title>Uploaded Files</title>
	</head>
	<body>
		<div class="wrapper">
			<h1 class="header">Uploaded Files</h1>
			<?php foreach($name as $key => $image_name): if($has_image): ?>
			<div class="image-details">
				<div class="image-container">
					<img class="photo" src="<?php echo $dir.'/'.$image_name ?>">
				</div>
				<div class="image-text">
					<p><b>Name:</b> <span><?php echo $name[$key] ?></span></p>
					<p><b>Type:</b> <span><?php echo $type[$key] ?></span></p>
					<p><b>Dimension:</b> <span><?php echo $width[$key].' x '. $height[$key];  ?></span></p>
					<p><b>Size:</b> <span><?php echo round($size[$key] / 1024) ?></span> <b>KB</b></p>
				</div>
			</div>
			<?php endif; endforeach; ?>
		</div>
	</body>
</html>