<?php

if (isset($_POST['submit'])) {
  // Get reference to uploaded image
  $image_file = $_FILES["gambar"];

  mkdir("/opt/xampp/htdocs/aplikasi-SPT/gambar/", 0755);
  // Exit if no file uploaded
  if (!isset($image_file)) {
      die('No file uploaded.');
  }

  // Exit if is not a valid image file
  $image_type = exif_imagetype($image_file["tmp_name"]);
  if (!$image_type) {
      die('Uploaded file is not an image.');
  }

  // Move the temp image file to the images/ directory
  move_uploaded_file(
      // Temp image location
      $image_file["tmp_name"],

      // New image location
      __DIR__ . "/images/" . $image_file["name"]
  );

}
 ?>




<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form class="" action="https://localhost/aplikasi-SPT/coba-upload.php" method="post" enctype="multipart/form-data">
      <input type="file" name="gambar" value="">
      <button type="submit" name="submit">Kirim</button>
    </form>
  </body>
</html>
