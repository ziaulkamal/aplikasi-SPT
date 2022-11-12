<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="viho admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, viho admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="<?= base_url('assets_sys/') ?>images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="<?= base_url('assets_sys/') ?>images/favicon.png" type="image/x-icon">
    <title><?php if (isset($title)) {
      echo $title;
    }else {
      echo "SiBatuah Apps";
    } ?></title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets_sys/') ?>css/fontawesome.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets_sys/') ?>css/icofont.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets_sys/') ?>css/themify.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets_sys/') ?>css/flag-icon.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets_sys/') ?>css/feather-icon.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets_sys/') ?>css/bootstrap.css">
    <?php if ($this->uri->segment(1) == 'upload_dokumen') {?>
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets_sys/') ?>css/dropzone.css">
    <?php } ?>
    <?php if (isset($opt) && $opt == 'table' || $this->uri->segment(1) == 'pengaturan_kecamatan') { ?>
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets_sys/') ?>css/datatable-extension.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets_sys/') ?>css/datatables.css">
    <?php } ?>
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets_sys/') ?>css/style.css">
    <link id="color" rel="stylesheet" href="<?= base_url('assets_sys/') ?>css/color-1.css" media="screen">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets_sys/') ?>css/responsive.css">
    <?php if (isset($opt) && $opt == 'form') { ?>
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets_sys/') ?>css/select2.css">
    <?php } ?>
  </head>
  <body>
    <div class="loader-wrapper">
      <div class="theme-loader">
        <div class="loader-p"></div>
      </div>
    </div>
    <?php if (!isset($err)) { ?>
      <div class="page-wrapper compact-wrapper" id="pageWrapper">
        <div class="page-main-header">
          <div class="main-header-right row m-0">
            <div class="main-header-left">
              <div class="logo-wrapper"><a href="<?= base_url(); ?>"><img class="img-fluid" src="<?= base_url('assets_sys/') ?>images/logo/logo-sibatuah.png" alt="<?= $title; ?>"></a></div>
              <div class="dark-logo-wrapper"><a href="<?= base_url(); ?>"><img class="img-fluid" src="<?= base_url('assets_sys/') ?>images/logo/logo-sibatuah.png" alt="<?= $title; ?>"></a></div>
              <div class="toggle-sidebar"><i class="status_toggle middle" data-feather="align-center" id="sidebar-toggle"></i></div>
            </div>
            <div class="left-menu-header col">
            </div>
            <div class="nav-right col pull-right right-menu p-0">
              <ul class="nav-menus">
                <li class="onhover-dropdown p-0">
                  <button class="btn btn-primary-light" onclick="exit()" type="button"><i data-feather="log-out"></i>Log out</button>
                </li>
              </ul>
            </div>
            <div class="d-lg-none mobile-toggle pull-right w-auto"><i data-feather="more-horizontal"></i></div>
          </div>
        </div>
        <div class="page-body-wrapper horizontal-menu">
          <?php if ($this->session->userdata('userLogin') == FALSE || $this->session->userdata('complete') == FALSE) {
            // code...
          }else { ?>
          <header class="main-nav">
            <div class="sidebar-user text-center"><img class="img-90 rounded-circle" src="<?= base_url('assets_sys/') ?>images/dashboard/1.png" alt="">
              <div class="badge-bottom"><span class="badge badge-primary">New</span></div><a href="user-profile.html">
                <h6 class="mt-3 f-14 f-w-600"><?= $this->session->userdata('nama') ?></h6></a>
                <p class="mb-0 font-roboto"><?php if ($this->session->userdata('level') == 1) { echo ucwords($this->session->userdata('operator')); }else { echo "Operator" . ucwords($this->session->userdata('operator')); }?></p>
              </div>
              <?php $this->load->view('template/sidebar'); ?>
            </header>

        <?php }
       } ?>
