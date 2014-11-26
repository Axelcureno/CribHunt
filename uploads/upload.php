<?php
//if Submit was clicked
if(isset($_POST['files[]'])) {
	//We define a favriable for the target folder for the file
	$target = "uploads/";
	//We define a variable with the name of the file
	$file_name = $_FILES['file']['name'];
	//We define a variable for the temporary directory for the file
	$tmp_dir = $_FILES['file']['tmp_name'];

	//We use a try to match the following, if it fails the catch exception is called
	try
	{
		//We use a regular expression to only accept image files, if it fails the throw exception is called
		if(!preg_match('/(gif|jpe?g|png)$/i', $file_name) || 
			//We use another regex in our if to check if the file type is an image, like a double check
			!preg_match('/^(image)/', $_FILES['file']['type']) ||
			//We also check if the file size is over 300000 bytes
			$_FILES['file']['size'] > 300000) 
		{	
			//In case the if matches (means something is different in 3 cases) the exception is made and the file is not uploaded
			throw new Exception("Not quite, buddy!");
			//We call the exit of the try
			exit;
		}
		//In case nothing was wrong, we move the file to the destination directory
		move_uploaded_file($tmp_dir, $target . $file_name);
		//We make a boolean var to say everything went fine with the file uploaded
		$status = true;
	}
	//In case something went wrong with the first try, a message is displayed to show the error	
	catch(Exception $e)
		{
			echo $e->getMessage();
		}
}
	//If the variable status exists (the file was uploaded) we display a message to confirm everything went fine
	if(isset($status)) {
		//We define a var with the path of the file so we can make an html link to see the file, genius.
		$path = $target . $file_name;
		echo "Congratulations. <a href=\"$path\">View your image.</a>";
	}
?>


<?php

echo json_encode(array('status' => 'ok'));

?>
