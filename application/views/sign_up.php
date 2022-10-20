<section>
  <div class="container-fluid p-0">
    <div class="row m-0">
      <div class="col-xl-7"><img class="bg-img-cover" src="<?= base_url('assets_sys/') ?>images/login/3.jpg" alt="looginpage"></div>
      <div class="col-xl-5 p-0">
        <div class="login-card">
          <form class="theme-form login-form">
            <h4>Register</h4>
            <h6><?= $title ?></h6>
            <div class="form-group">
              <label>Nama Lengkap</label>
              <div class="small-group">
                <div class="input-group"><span class="input-group-text"><i class="icon-user"></i></span>
                  <input class="form-control" type="email" required="" placeholder="First Name">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label>Alamat Email</label>
              <div class="input-group"><span class="input-group-text"><i class="icon-email"></i></span>
                <input class="form-control" type="email" required="" placeholder="Test@gmail.com">
              </div>
            </div>
            <div class="form-group">
              <label>Password</label>
              <div class="input-group"><span class="input-group-text"><i class="icon-lock"></i></span>
                <input class="form-control" type="password" name="login[password]" required="" placeholder="*********">
                <div class="show-hide"><span class="show">                         </span></div>
              </div>
            </div>
            <div class="form-group">
              <label>Ulangi Password</label>
              <div class="input-group"><span class="input-group-text"><i class="icon-lock"></i></span>
                <input class="form-control" type="password" name="login[password]" required="" placeholder="*********">
                <div class="show-hide"><span class="show">                         </span></div>
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
