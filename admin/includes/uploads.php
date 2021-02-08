
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
<title>Document</title>
</head>
<body>
<form action="uploads.php" enctype="multipart/form-data" method ="post">
  <input type = "file" name="file_upload"><br />
  <input type = "submit" name = "submit">
</form>
</body>
</html>
<?php   
if(isset($_POST['submit'])){


	$upload_errors = array(
		UPLOAD_ERR_OK =>"There is no error",
		UPLOAD_ERR_INI_SIZE =>"The uploaded file exceeds the upload_max_filesize",
		UPLOAD_ERR_FORM_SIZE =>"The uploaded file exceeds the MAX_FILE_SIZE directive",
		UPLOAD_ERR_PARTIAL => "The uploaded file was only paritally uploaded",
		UPLOAD_ERR_NO_FILE => "No file was uploaded",
		UPLOAD_ERR_NO_TMP_DIR => "Missing temporary folder",
		UPLOAD_ERR_CANT_WRITE =>"Faile to write to disk",
		UPLOAD_ERR_EXTENSION => "A PHP extension stopped the file upload"
	);

$temp_name =$_FILES['file_upload']['tmp_name'];
$the_file = $_FILES['file_upload']['name'];
$directory = "uploads";

if(move_uploaded_file($temp_name,$directory."/" . $the_file)){

	  $the_message = "file uploaded successfully";

}else{
	$the_error = $_FILES['file_upload']['error'];
	$the_message = $upload_errors[$the_error];
}
 echo $the_message;
}

?>

