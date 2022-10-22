<section>
  <div class="container-fluid p-0">
    <div class="row m-0">
      <div class="col-xl-7"><img class="bg-img-cover" src="<?= base_url('assets_sys/') ?>images/login/3.jpg" alt="looginpage"></div>
      <div class="col-xl-5 p-0">
        <div class="login-card">

          <form class="theme-form login-form" method="POST" action="<?= base_url('process/sign_up') ?>" enctype="multipart/form-data">
            <h4>Register</h4>
            <h6><?= $title ?></h6>
            <?= validation_errors('<div class="alert alert-danger dark alert-dismissible fade show" role="alert">','</div>'); ?>
            <div class="form-group">
              <label>Nama Lengkap</label>
              <div class="small-group">
                <div class="input-group"><span class="input-group-text"><i class="icon-user"></i></span>
                  <input class="form-control" type="text" name="nama" value="<?= set_value('nama'); ?>">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label>Alamat Email</label>
              <div class="input-group"><span class="input-group-text"><i class="icon-email"></i></span>
                <input class="form-control" type="email" name="email" value="<?= set_value('email'); ?>">
              </div>
            </div>
            <div class="form-group">
              <label>Password</label>
              <div class="input-group"><span class="input-group-text"><i class="icon-lock"></i></span>
                <input class="form-control" type="password" name="password" value="<?= set_value('password'); ?>">
                <div class="show-hide"><span class="show"></span></div>
              </div>
            </div>
            <div class="form-group">
              <label>Ulangi Password</label>
              <div class="input-group"><span class="input-group-text"><i class="icon-lock"></i></span>
                <input class="form-control" type="password" name="repassword" value="<?= set_value('repassword'); ?>">
                <div class="show-hide"><span class="show"></span></div>
              </div>
            </div>

            <div class="form-group">
              <button class="btn btn-primary btn-block" type="submit">Buat Akun Baru</button>
            </div>
            <div class="login-social-title">
              <h5>Atau</h5>
            </div>

            <p>Sudah memiliki akun?<a class="ms-2" href="<?= base_url('sign_in') ?>">Login Disini !</a></p>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
