<div class="page-body">
  <div class="container-fluid">
    <div class="page-header">
      <?php
      if ($part == 'lokal') { ?>

        <div class="col-sm-12">
          <div class="card">
            <div class="card-header">
              <h5><?= $title.' - '.$title2; ?></h5>
              <span>Lihat data penduduk yang sudah terdata di aplikasi, data di tabel bawah ini merupakan data penduduk lokal kecamatan singkil </span>
            </div>
            <div class="card-body">
              <div class="dt-ext table-responsive">
                <table class="display" id="responsive">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Lengkap</th>
                      <th>NIK</th>
                      <th>Jenis Kelamin</th>
                      <th>Kelurahan / Gampong</th>
                      <th>Alamat</th>
                      <th>No HP</th>
                      <th>Terdaftar</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $numlo = 1;
                    foreach ($db as $reslo) { ?>
                      <tr>
                        <td><?= $numlo++ ?></td>
                        <td><?= $reslo->namaP ?></td>
                        <td><?= $reslo->nikP ?></td>
                        <td><?php if ($reslo->jenisKelaminP == 1) { echo "Laki-laki"; }else { echo "Perempuan"; } ?></td>
                        <td><?= $reslo->namaG ?></td>
                        <td><?= $reslo->alamatA ?></td>
                        <td><?= $reslo->nomorHpP ?></td>
                        <td><?= $reslo->createdAt ?></td>
                      </tr>
                    <?php } ?>

                  </tbody>

                </table>
              </div>
            </div>
          </div>
        </div>

      <?php }elseif ($part == 'luar') { ?>

        <div class="col-sm-12">
          <div class="card">
            <div class="card-header">
              <h5><?= $title.' - '.$title2; ?></h5>
              <span>Lihat data penduduk yang sudah terdata di aplikasi, data di tabel bawah ini merupakan data penduduk Luar kecamatan singkil </span>
            </div>
            <div class="card-body">
              <div class="dt-ext table-responsive">
                <table class="display" id="responsive">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Lengkap</th>
                      <th>NIK</th>
                      <th>Jenis Kelamin</th>
                      <th>Kelurahan / Gampong</th>
                      <th>Alamat</th>
                      <th>No HP</th>
                      <th>Terdaftar</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $numlu = 1;
                    foreach ($db as $reslu) { ?>
                      <tr>
                        <td><?= $numlu++ ?></td>
                        <td><?= $reslu->namaP ?></td>
                        <td><?= $reslu->nikP ?></td>
                        <td><?php if ($reslu->jenisKelaminP == 1) { echo "Laki-laki"; }else { echo "Perempuan"; } ?></td>
                        <td><?= $reslu->namaG ?></td>
                        <td><?= $reslu->alamatA ?></td>
                        <td><?= $reslu->nomorHpP ?></td>
                        <td><?= $reslu->createdAt ?></td>
                      </tr>
                    <?php } ?>

                  </tbody>

                </table>
              </div>
            </div>
          </div>
        </div>


      <?php } ?>


    </div>
  </div>
</div>
