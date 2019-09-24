<div class="slim-navbar">
      <div class="container">
        <ul class="nav">
          <li class="nav-item active">
            <a class="nav-link" href="<?= site_url('Home/index') ?>">
              <i class="icon ion-ios-home-outline"></i>
              <span>Home</span>
            </a>
          </li>
          <li class="nav-item with-sub">
            <a class="nav-link" href="#">
              <i class="icon ion-ios-chatboxes-outline"></i>
              <span>Pelayanan</span>
            </a>
            <div class="sub-item">
              <ul>
                <li><a href="<?= site_url('Pelayanan/Registrasi')?>">Registrasi</a></li>
                <li><a>Rekam Medis</a></li>
                <li><a>Resep Obat</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item with-sub">
            <a class="nav-link" href="#">
              <i class="icon ion-ios-medkit-outline"></i>
              <span>Farmasi</span>
            </a>
            <div class="sub-item">
              <ul>
                <li><a>Stok Obat</a></li>
                <li><a>Pemasukan Obat</a></li>
                <li><a>Resep Obat</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item with-sub">
            <a class="nav-link" href="#">
              <i class="icon ion-ios-pie-outline"></i>
              <span>Grafik</span>
            </a>
            <div class="sub-item">
              <ul>
                <li><a>Kunjungan</a></li>
                <li><a>Pemasukan Obat</a></li>
                <li><a>Resep Obat</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item with-sub">
            <a class="nav-link" href="#">
              <i class="icon ion-ios-filing-outline"></i>
              <span>Master Data</span>
            </a>
            <div class="sub-item">
              <ul>
                <li><a href="<?= site_url('Master/Code')?>" >Master Kode</a></li>
                <li><a href="<?= site_url('Master/Obat')?>" >Master Obat</a></li>
                <li><a href="<?= site_url('Master/')?>" >Pegawai</a></li>
              </ul>
            </div>
          </li>
           <li class="nav-item with-sub">
            <a class="nav-link" href="#">
              <i class="icon ion-ios-gear-outline"></i>
              <span>Setting</span>
            </a>
            <div class="sub-item">
              <ul>
                <li><a>User</a></li>
                <li><a>Group</a></li>
                <li><a>Role Access</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </div><!-- container -->
    </div><!-- slim-navbar -->