<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>HTML5 File API</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
  <div id="main">
		<form method="post" enctype="multipart/form-data"  action="">
    		<input type="file" name="images" id="images" multiple />
    		<button type="submit" id="btn">Upload Files!</button>
    	</form>
  	<div id="response"></div>
		<ul id="image-list">
		</ul>
	</div>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
  <script src="upload.js"></script>
</body>
</html>

