<?php
require('pix.php');

if (!empty($_FILES["file"]))
{
    if ($_FILES["file"]["error"] > 0)
       {echo "Error: " . $_FILES["file"]["error"] . "<br>";}
    else{
		$ext=pathinfo($_FILES["file"]['name'], PATHINFO_EXTENSION);
		
		if($ext == "jpg" || $ext == "jpeg")
			$img = imagecreatefromjpeg($_FILES['file']['tmp_name']);
		elseif($ext == "png")
			$img = imagecreatefrompng($_FILES['file']['tmp_name']);
		elseif($ext == "gif")
			$img = imagecreatefromgif($_FILES['file']['tmp_name']);
		else
			echo 'Unsupported file extension';
		
		toSkin($img,getimagesize($_FILES['file']['tmp_name']),$_POST['color'],$_POST['sided']);
	}
}

?>

<form enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
Please choose a file: <input name="file" type="file" />
<br><br>
<input type="radio" name="color" value="" checked> black background <input type="radio" name="color" value="true"> colored background
<br><br>
<input type="radio" name="sided" value="" checked> 1-side <input type="radio" name="sided" value="true"> 2-sides
<br><br>
<input type="submit" value="Submit" />
</form>