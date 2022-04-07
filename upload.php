<?php  
if (isset($_POST['submit'])) {
	$fileName = $_FILES['file'];
	$fileTmpName = $_FILES['file']['tmp_name'];
	$fileSize = $_FILES['file']['size'];
	$fileError = $_FILES['file']['error'];
	$fileType = $_FILES['file']['type'];
	
	$fileExt = explode('.', $fileName);
	$fileActualExt = strtolower(end($fileExt));
	$allowed = array('jpg', 'jpeg', 'png', 'pdf');

	if (in_array($fileActualExt, $allowed)) {
		if ($fileError == 0) {
			if ($fileSize < 1000000) {
				$fileNameNew = uniqid('', true).".".fileActualExt;
				$fileDestination = 'upload/'.$fileNameNew;
				move_uploaded_file($fileTmpName, $fileDestination);
				header("Location: index.php?uploadsuccess");
			}else{
				echo "Your File IS Too Big!";
			}
		}
	}else{
		echo "You Cannot Upload Files Of This Type!";
	}

}
