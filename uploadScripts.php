<?php
$path = "uploads/";
$finalImage = "images/upload.png";
$valid_formats = array("jpg", "png", "gif", "bmp","jpeg");

if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {
  $name = $_FILES['upload_file']['name'];
  $size = $_FILES['upload_file']['size'];
  if(strlen($name)) {
    list($txt, $ext) = explode(".", $name);
    if(in_array($ext,$valid_formats)) {
      if($size<(1024*1024)) // Image size max 1 MB
      {
        $actual_image_name = time().".".$ext;
        $tmp = $_FILES['upload_file']['tmp_name'];

        if(move_uploaded_file($tmp, $path.$actual_image_name)) {
          echo "<img id='imgsrc' class='imgsrc' src='uploads/".$actual_image_name."' width='192px' height='192px'></img> <input type='hidden' name='imgsrc' form='addRoom' value='uploads/".$actual_image_name."'/>";
        }else
          echo "failed";
      }
      else
        echo "Image file size max 1 MB";
    }
    else
      echo "Invalid file format..";
  }
  else
    echo "Please select image..!";
  exit;
}
?>