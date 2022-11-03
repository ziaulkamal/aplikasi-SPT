<?php echo $this->session->flashdata('berkas'); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form class="" action="<?= base_url('Test/proses') ?>" method="POST" enctype="multipart/form-data">
      <input type="file" name="f1">
      <input type="file" name="f2">
      <input type="file" name="f3">
    <button type="submit" name="button">Upload</button>
    </form>
  </body>
</html>
