<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?= base_url('assets_sys/'); ?>images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="<?= base_url('assets_sys/'); ?>images/favicon.png" type="image/x-icon">
    <title><?= $title ?></title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets_sys/'); ?>css/fontawesome.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets_sys/'); ?>css/icofont.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets_sys/'); ?>css/themify.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets_sys/'); ?>css/flag-icon.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets_sys/'); ?>css/feather-icon.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets_sys/'); ?>css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets_sys/'); ?>css/style.css">
    <link id="color" rel="stylesheet" href="<?= base_url('assets_sys/'); ?>css/color-1.css" media="screen">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets_sys/'); ?>css/responsive.css">
  </head>
  <body>
    <div class="loader-wrapper">
      <div class="theme-loader">
        <div class="loader-p"></div>
      </div>
    </div>
    <section>
      <div class="container-fluid p-0">
        <div class="row">
          <div class="col-12">


            <div class="login-card">
              <form class="theme-form login-form" action="<?= base_url($action) ?>" enctype="multipart/form-data" method="POST">
                <h4><?= $title ?></h4>
                <h6>Selamat datang petugas kecamatan !</h6>
                <?php if($this->session->flashdata('msg')) { ?>

                  <div class="alert alert-success outline alert-dismissible fade show" role="alert">
                    <p><?= $this->session->flashdata('msg') ?>! </p>
                    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>

                <?php } ?>
                <div class="form-group">
                  <label>Email Address</label>
                  <div class="input-group"><span class="input-group-text"><i class="icon-email"></i></span>
                    <input class="form-control" type="email" name="email" value="<?= set_value('email') ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <div class="input-group"><span class="input-group-text"><i class="icon-lock"></i></span>
                    <input class="form-control" type="password" name="passwd" value="<?= set_value('passwd') ?>">
                  </div>
                </div>

                <div class="form-group">
                  <button class="btn btn-primary btn-block" type="submit">Sign in</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <script src="<?= base_url('assets_sys/'); ?>js/jquery-3.5.1.min.js"></script>
    <script src="<?= base_url('assets_sys/'); ?>js/icons/feather-icon/feather.min.js"></script>
    <script src="<?= base_url('assets_sys/'); ?>js/icons/feather-icon/feather-icon.js"></script>
    <script src="<?= base_url('assets_sys/'); ?>js/sidebar-menu.js"></script>
    <script src="<?= base_url('assets_sys/'); ?>js/config.js"></script>
    <script src="<?= base_url('assets_sys/'); ?>js/bootstrap/popper.min.js"></script>
    <script src="<?= base_url('assets_sys/'); ?>js/bootstrap/bootstrap.min.js"></script>
    <script src="<?= base_url('assets_sys/'); ?>js/script.js"></script>

  </body>
</html>
