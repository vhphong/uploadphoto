<?php
  error_reporting(0);
?>

<?php
  $msg = "";

  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
    $filename = $_FILES["choosefile"]["name"];
    $tempname = $_FILES["choosefile"]["tmp_name"];
    $folder = "image/".$filename;

    $dbconn = mysqli_connect("localhost", "root", "", "dbphotos");

    // Get all the submitted data from the form
    $sql = "INSERT INTO image (filename) VALUES ('$filename')";

    // Execute query
    mysqli_query($dbconn, $sql);

    // Now let's move the uploaded image into the folder: image
    if (move_uploaded_file($tempname, $folder))  {
      $msg = "Image uploaded successfully";
    }
    else{
      $msg = "Failed to upload image";
    }
  }
  $result = mysqli_query($dbconn, "SELECT * FROM image");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Image Upload</title>
  <link rel="stylesheet" type= "text/css" href ="style.css"/>
  <div id="content">

    <form method="POST" action="" enctype="multipart/form-data">
      <input type="file" name="choosefile" value=""/>

      <div>
        <button type="submit" name="upload">UPLOAD</button>
      </div>
    </form>
  </div>
</body>
</html>
