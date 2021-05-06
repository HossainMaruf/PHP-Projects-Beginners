<html>
	<head>
		<link rel="stylesheet" type="text/css" href="./style/style.css">
		<title>File Upload</title>
	</head>
	<body>
		<div class="container">
			<form class="form" action="data.php" method="POST" enctype="multipart/form-data">
				<input class="form__input-file" type="file" name="photos[]" multiple>
				<input class="form__input-submit" type="submit" name="submit" value="POST">
			</form>
		</div>
	</body>
</html>