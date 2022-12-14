        <div class="page-body">
          <div class="container-fluid">
            <div class="page-header">
              <?php if ($this->session->flashdata('wellcome')) { ?>
                <div class="row">
                  <?php if ($this->session->flashdata('wellcome')) {?>
                    <div class="card-body">
                      <div class="alert alert-primary" role="alert">
                        <?php if ($this->session->userdata('complete') == TRUE) {?>
                        <h4 class="alert-heading">Berhasil Login !</h4>
                      <?php }else {?>
                          <h4 class="alert-heading">Berhasil Melengkapi Profil !</h4>
                      <?php } ?>
                      <p><?= $this->session->flashdata('wellcome'); ?></p>
                        <hr>
                        <?php if ($this->session->userdata('complete') == TRUE) {?>
                          <p class="mb-0">Sekarang anda bisa menggunakan layanan ini dengan penuh. Demi keamanan sistem aplikasi, setiap <b>User Email</b> hanya bisa di akses melalui <b>1</b> perangkat saja.<br />
                            Jika anda merasa anda tidak login di perangkat yang berbeda, maka silahkan hubungi operator di kecamatan.
                          </p>

                        <?php }else { ?>
                          <p class="mb-0">Untuk dapat melanjutkan menggunakan aplikasi, log out terlebih dauhulu untuk menampilakan semua menu !</p>

                        <?php } ?>
                      </div>

                    </div>
                  <?php } ?>

                </div>
              <?php } ?>
                <?php if ($this->session->userdata('userLogin') == TRUE && $this->session->userdata('level') == '2') {?>
                <div class="row">
                  <div class="col-sm-6 col-xl-3 col-lg-6">
                    <div class="card o-hidden border-0">
                      <div class="bg-primary b-r-4 card-body">
                        <div class="media static-top-widget">
                          <div class="align-self-center text-center"><i data-feather="database"></i></div>
                          <div class="media-body"><span class="m-0">Menunggu Verifikasi</span>
                            <h4 class="mb-0 counter">12</h4><i class="icon-bg" data-feather="database"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-xl-3 col-lg-6">
                    <div class="card o-hidden border-0">
                      <div class="bg-secondary b-r-4 card-body">
                        <div class="media static-top-widget">
                          <div class="align-self-center text-center"><i data-feather="shopping-bag"></i></div>
                          <div class="media-body"><span class="m-0">Dana Desa</span>
                            <h4 class="mb-0 counter">33</h4><i class="icon-bg" data-feather="shopping-bag"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-xl-3 col-lg-6">
                    <div class="card o-hidden border-0">
                      <div class="bg-primary b-r-4 card-body">
                        <div class="media static-top-widget">
                          <div class="align-self-center text-center"><i data-feather="message-circle"></i></div>
                          <div class="media-body"><span class="m-0">Bantuan Sosial</span>
                            <h4 class="mb-0 counter">2</h4><i class="icon-bg" data-feather="message-circle"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-xl-3 col-lg-6">
                    <div class="card o-hidden border-0">
                      <div class="bg-primary b-r-4 card-body">
                        <div class="media static-top-widget">
                          <div class="align-self-center text-center"><i data-feather="user-plus"></i></div>
                          <div class="media-body"><span class="m-0">AJB</span>
                            <h4 class="mb-0 counter">1</h4><i class="icon-bg" data-feather="user-plus"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-12 recent-order-sec">
                <div class="card">
                  <div class="card-body">
                    <div class="table-responsive">
                      <h5>Aktivitas Terakhir</h5>
                      <table class="table table-bordernone">
                        <thead>
                          <tr>
                            <th>Tugas</th>
                            <th>Dikerjakan</th>
                            <th>Tanggal Update</th>
                            <th>Status</th>
                            <th>Detail </th>

                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>
                              <p>16 August</p>
                            </td>
                            <td>
                              <p>54146</p>
                            </td>
                            <td>111</td>
                            <td>
                              <p>$210326</p>
                            </td>
                            <td>
                              <p>Done</p>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                <?php }
                ?>

          </div>
        </div>
