<section>
  <div class="container-fluid">
    <div class="row">
      <div class="col-xl-7"><img class="bg-img-cover" src="<?= base_url('assets_sys/') ?>images/login/3.jpg" alt="looginpage"></div>
      <div class="col-xl-5 p-0">
        <div class="login-card">
          <form class="theme-form login-form" action="<?php if ($this->uri->segment(1) == 'sign_in') {
            echo base_url('process/login');
          }else {
            echo base_url('ressLogin');
          } ?>" method="POST" enctype="multipart/form-data">
            <?php if ($this->uri->segment(1) == 'sign_in') { echo "<h4>Login</h4>"; } ?>
            <h6><?= $title ?></h6>
            <?php
            echo validation_errors('<div class="alert alert-danger dark alert-dismissible fade show" role="alert">','</div>');
            if ($this->session->flashdata('msg'))
            {?> <div class="alert alert-success outline alert-dismissible fade show" role="alert"> <p><?= $this->session->flashdata('msg') ?></p> </div> <?php }
            if ($this->session->flashdata('wrong')) {?>
            <div class="alert alert-danger dark alert-dismissible fade show" role="alert"><?= $this->session->flashdata('wrong'); ?></div>
            <?php }
            if ($this->session->flashdata('nologin')) { ?>
              <div class="alert alert-danger dark alert-dismissible fade show" role="alert"><?= $this->session->flashdata('nologin'); ?></div>
            <?php }
             ?>
             <?php
             if ($this->uri->segment(1) == 'sign_in') { ?>
               <div class="form-group">
                 <label>Email Anda</label>
                 <div class="input-group"><span class="input-group-text"><i class="icon-email"></i></span>
                   <input class="form-control" type="email" name="email">
                 </div>
               </div>
               <div class="form-group">
                 <label>Password</label>
                 <div class="input-group"><span class="input-group-text"><i class="icon-lock"></i></span>
                   <input class="form-control" type="password" name="password">
                 </div>
               </div>
             <?php }else { ?>
               <input type="hidden" name="token" value="<?= $db['tokenReset'] ?>">
               <div class="form-group">
                 <label>Email Anda</label>
                 <div class="input-group"><span class="input-group-text"><i class="icon-email"></i></span>
                   <input class="form-control" type="email" name="email" value="<?= $db['emailReset'] ?>" readonly>
                 </div>
               </div>
               <div class="form-group">
                 <label>Password Baru !</label>
                 <div class="input-group"><span class="input-group-text"><i class="icon-lock"></i></span>
                   <input class="form-control" type="password" name="password" placeholder="Langsung di Isi dengan pasword baru !">
                 </div>
               </div>
             <?php }



              ?>
            <!-- <div class="form-group">
              <div class="checkbox">
                <input id="checkbox1" type="checkbox">
                <label class="text-muted" for="checkbox1">Remember password</label>
              </div><a class="link" href="">Forgot password?</a>
            </div> -->
            <div class="form-group">
              <button class="btn btn-primary btn-block" type="submit"><?php if ($this->uri->segment(1) == 'sign_in') {
                echo "Login";
              }else {
                echo "Perbaharui Password";
              } ?></button>
            </div>
            <p>Belum Punya Akun ?<a class="ms-2" href="<?= base_url('sign_up') ?>">Buat Akun Baru</a></p>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
