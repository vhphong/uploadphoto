<?php
  error_reporting(0);
?>

<?php
  // If upload button was clicked ...
  if (isset($_POST['upload'])) {
    // check if any file was chosen?
    // if no file was chosen
    if (empty($_FILES["choosefile"]["name"])){
      echo("No file was selected to upload");
    }
    else{ // if a file was chosen
      $filename = $_FILES["choosefile"]["name"];
      $tempname = $_FILES["choosefile"]["tmp_name"];
      $folder = "uploadedfiles/".$filename;

      $dbconn = mysqli_connect("localhost", "root", "", "dbfiles");

      // Get all the submitted data from the form
      $sql = "INSERT INTO upfile (filename) VALUES ('$filename')";

      // Execute query
      mysqli_query($dbconn, $sql);

      // Move the uploaded file into the folder: uploadedfiles
      if (move_uploaded_file($tempname, $folder)) {
        echo "File uploaded successfully";
      }
      else {
        die("Failed to upload file");
      }
    }

  }
  $result = mysqli_query($dbconn, "SELECT * FROM upfile");
?>

<!DOCTYPE html>
<html>
<head>
  <title>File Upload</title>
</head>
<body>
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
