<section>
  <div class="container-fluid">
    <div class="row">
      <div class="col-xl-7"><img class="bg-img-cover" src="<?= base_url('assets_sys/') ?>images/login/3.jpg" alt="looginpage"></div>
      <div class="col-xl-5 p-0">
        <div class="login-card">
          <form class="theme-form login-form">
            <h4>Login</h4>
            <h6><?= $title ?></h6>
            <div class="form-group">
              <label>Email Address</label>
              <div class="input-group"><span class="input-group-text"><i class="icon-email"></i></span>
                <input class="form-control" type="email" required="" placeholder="Test@gmail.com">
              </div>
            </div>
            <div class="form-group">
              <label>Password</label>
              <div class="input-group"><span class="input-group-text"><i class="icon-lock"></i></span>
                <input class="form-control" type="password" name="login[password]" required="" placeholder="*********">
                <div class="show-hide"><span class="show"></span></div>
              </div>
            </div>
            <!-- <div class="form-group">
              <div class="checkbox">
                <input id="checkbox1" type="checkbox">
                <label class="text-muted" for="checkbox1">Remember password</label>
              </div><a class="link" href="">Forgot password?</a>
            </div> -->
            <div class="form-group">
              <button class="btn btn-primary btn-block" type="submit">Sign in</button>
            </div>
            <p>Belum Punya Akun ?<a class="ms-2" href="<?= base_url('sign_up') ?>">Buat Akun Baru</a></p>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
