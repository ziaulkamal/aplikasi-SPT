





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
                <?php if ($this->session->userdata('userLogin') == TRUE && $this->session->userdata('isAdmin') == TRUE) {?>
                <div class="row">
                  <div class="col-sm-6 col-xl-3 col-lg-6">
                    <div class="card o-hidden border-0">
                      <div class="bg-primary b-r-4 card-body">
                        <div class="media static-top-widget">
                          <div class="align-self-center text-center"><i data-feather="database"></i></div>
                          <div class="media-body"><span class="m-0">Dokumen DDS (Desa / Gampong)</span>
                            <h4 class="mb-0 counter"><?= $db['jumlah_dds']; ?></h4><i class="icon-bg" data-feather="database"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-xl-3 col-lg-6">
                    <div class="card o-hidden border-0">
                      <div class="bg-primary b-r-4 card-body">
                        <div class="media static-top-widget">
                          <div class="align-self-center text-center"><i data-feather="database"></i></div>
                          <div class="media-body"><span class="m-0">Dokumen ADK (Desa / Gampong)</span>
                            <h4 class="mb-0 counter"><?= $db['jumlah_adk']; ?></h4><i class="icon-bg" data-feather="database"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-xl-3 col-lg-6">
                    <div class="card o-hidden border-0">
                      <div class="bg-primary b-r-4 card-body">
                        <div class="media static-top-widget">
                          <div class="align-self-center text-center"><i data-feather="database"></i></div>
                          <div class="media-body"><span class="m-0">Dokumen DDS (Kecamatan)</span>
                            <h4 class="mb-0 counter"><?= $db['jumlah_dds_k']; ?></h4><i class="icon-bg" data-feather="database"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-xl-3 col-lg-6">
                    <div class="card o-hidden border-0">
                      <div class="bg-primary b-r-4 card-body">
                        <div class="media static-top-widget">
                          <div class="align-self-center text-center"><i data-feather="database"></i></div>
                          <div class="media-body"><span class="m-0">Dokumen ADK (Kecamatan)</span>
                            <h4 class="mb-0 counter"><?= $db['jumlah_adk_k']; ?></h4><i class="icon-bg" data-feather="database"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6 col-xl-3 col-lg-6">
                    <div class="card o-hidden border-0">
                      <div class="bg-dark b-r-4 card-body">
                        <div class="media static-top-widget">
                          <div class="align-self-center text-center"><i data-feather="briefcase"></i></div>
                          <div class="media-body"><span class="m-0">Dokumen AJB</span>
                            <h4 class="mb-0 counter"><?= $db['jumlah_ajb']; ?></h4><i class="icon-bg" data-feather="briefcase"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-xl-3 col-lg-6">
                    <div class="card o-hidden border-0">
                      <div class="bg-dark b-r-4 card-body">
                        <div class="media static-top-widget">
                          <div class="align-self-center text-center"><i data-feather="briefcase"></i></div>
                          <div class="media-body"><span class="m-0">Dokumen Rekomendasi Bantuan</span>
                            <h4 class="mb-0 counter"><?= $db['jumlah_rekomendasi']; ?></h4><i class="icon-bg" data-feather="briefcase"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-xl-3 col-lg-6">
                    <div class="card o-hidden border-0">
                      <div class="bg-dark b-r-4 card-body">
                        <div class="media static-top-widget">
                          <div class="align-self-center text-center"><i data-feather="info"></i></div>
                          <div class="media-body"><span class="m-0">Desa / Gampong Terdata</span>
                            <h4 class="mb-0 counter"><?= $db['jumlah_gampong']; ?></h4><i class="icon-bg" data-feather="info"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-xl-3 col-lg-6">
                    <div class="card o-hidden border-0">
                      <div class="bg-dark b-r-4 card-body">
                        <div class="media static-top-widget">
                          <div class="align-self-center text-center"><i data-feather="users"></i></div>
                          <div class="media-body"><span class="m-0">User Terdata</span>
                            <h4 class="mb-0 counter"><?= $db['jumlah_user']; ?></h4><i class="icon-bg" data-feather="users"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <?php }

                if ($this->session->userdata('userLogin') == TRUE && $this->session->userdata('isAdmin') == FALSE) { ?>
                  <div class="row">
                    <div class="col-sm-6 col-xl-3 col-lg-6">
                      <div class="card o-hidden border-0">
                        <div class="bg-primary b-r-4 card-body">
                          <div class="media static-top-widget">
                            <div class="align-self-center text-center"><i data-feather="database"></i></div>
                            <div class="media-body"><span class="m-0">Dokumen DDS (Desa / Gampong)</span>
                              <h4 class="mb-0 counter"><?= $db['jumlah_dds']; ?></h4><i class="icon-bg" data-feather="database"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6 col-xl-3 col-lg-6">
                      <div class="card o-hidden border-0">
                        <div class="bg-primary b-r-4 card-body">
                          <div class="media static-top-widget">
                            <div class="align-self-center text-center"><i data-feather="database"></i></div>
                            <div class="media-body"><span class="m-0">Dokumen ADK (Desa / Gampong)</span>
                              <h4 class="mb-0 counter"><?= $db['jumlah_adk']; ?></h4><i class="icon-bg" data-feather="database"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6 col-xl-3 col-lg-6">
                      <div class="card o-hidden border-0">
                        <div class="bg-primary b-r-4 card-body">
                          <div class="media static-top-widget">
                            <div class="align-self-center text-center"><i data-feather="database"></i></div>
                            <div class="media-body"><span class="m-0">Dokumen DDS (Kecamatan)</span>
                              <h4 class="mb-0 counter"><?= $db['jumlah_dds_k']; ?></h4><i class="icon-bg" data-feather="database"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6 col-xl-3 col-lg-6">
                      <div class="card o-hidden border-0">
                        <div class="bg-primary b-r-4 card-body">
                          <div class="media static-top-widget">
                            <div class="align-self-center text-center"><i data-feather="database"></i></div>
                            <div class="media-body"><span class="m-0">Dokumen ADK (Kecamatan)</span>
                              <h4 class="mb-0 counter"><?= $db['jumlah_adk_k']; ?></h4><i class="icon-bg" data-feather="database"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                <?php }
                ?>

          </div>
        </div>
