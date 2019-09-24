<div class="slim-pageheader">
  <ol class="breadcrumb slim-breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"><a href="#">Pelayanan</a></li>
    <li class="breadcrumb-item active" aria-current="page">Registrasi</li>
  </ol>
  <h6 class="slim-pagetitle">Registrasi</h6>
</div><!-- slim-pageheader -->

<div class="section-wrapper">
  <form action="<?= site_url('Pelayanan/Registrasi/add')?>" method="POST">
    

 <div class="form-layout">
  <div class="row">
    <div class="col-md-6">
      <div class="row ">
          <div class="col-lg-6">
            <div class="form-group">
              <label class="form-control-label">Jenis Kunjungan: <span class="tx-danger">*</span></label>
              <div class="row">
                <div class="col-lg-6">
                  <label class="rdiobox">
                    <input name="pasien" value="1" type="radio">
                    <span>Baru</span>
                  </label>    
                </div>
                <div class="col-lg-6">
                  <label class="rdiobox">
                    <input name="pasien" value="0" type="radio">
                    <span>Lama</span>
                  </label>
                </div>
              </div>
            </div>
          </div><!-- col-4 -->
        </div>
        <div class="row ">
          <div class="col-lg-6">
            <div class="form-group">
              <label class="form-control-label">Nomor RM: <span class="tx-danger">*</span></label>
              <div class="input-group">
                <input type="text" class="form-control" name="norm" id="norm" placeholder="Nomor Rekam Medis">
                <span class="input-group-btn">
                  <button class="btn bd bd-l-0 bg-white tx-gray-600" type="button" onclick="searchByRM()"><i class="fa fa-search"></i></button>
                </span>
              </div><!-- input-group -->
            </div>
          </div><!-- col-4 -->
          <div class="col-lg-6">
            <div class="form-group">
              <label class="form-control-label">Jenis Pasien: <span class="tx-danger">*</span></label>
              <select class="form-control select2" name="pasien_type" id="pasien_type">
                <option value="">Jenis Pasien</option>
                <?php foreach ($pasien_type as $row): ?>
                  <option value="<?= $row->idcode?>"><?= $row->full_name?></option>
                <?php endforeach ?>
              </select>
            </div>
          </div><!-- col-4 -->
        </div>
        <div class="row ">
          <div class="col-lg-6">
            <div class="form-group">
              <label class="form-control-label">No KTP<span class="tx-danger">*</span></label>
              <input class="form-control" type="text" name="noktp"  id="noktp" placeholder="Nomor KTP">
            </div>
          </div><!-- col-4 -->
          <div class="col-lg-6">
            <div class="form-group">
              <label class="form-control-label">No BPJS:</label>
              <div class="input-group">
                <input type="text" class="form-control" name="nobpjs" id="nobpjs" placeholder="Nomor BPJS">
                <span class="input-group-btn">
                  <button class="btn bd bd-l-0 bg-white tx-gray-600" type="button"><i class="fa fa-search"></i></button>
                </span>
              </div><!-- input-group -->
            </div>
          </div><!-- col-4 -->
        </div>
        <div class="row ">
          <div class="col-lg-12">
            <div class="form-group">
              <label class="form-control-label">Nama<span class="tx-danger">*</span></label>
              <input class="form-control" type="text" name="nama" id="nama" placeholder="Nama Pasien">
            </div>
          </div><!-- col-4 -->
        </div>
        <div class="row ">
          <div class="col-lg-6">
            <div class="form-group">
              <label class="form-control-label">Tanggal Lahir<span class="tx-danger">*</span></label>
              <input class="form-control" type="date" name="birth_dt"  id="birth_dt" placeholder="Tanggal Lahir">
            </div>
          </div><!-- col-4 -->
          <div class="col-lg-6">
            <div class="form-group">
              <label class="form-control-label">Nomor HP<span class="tx-danger">*</span></label>
              <input class="form-control" type="text" name="nohp"  id="nohp" placeholder="Nomor HP">
            </div>
          </div><!-- col-4 -->
        </div>
        <div class="row ">
          <div class="col-lg-6">
            <div class="form-group">
              <label class="form-control-label">Jenis Kelamin<span class="tx-danger">*</span></label>
              <div class="row">
                <div class="col-lg-6">
                  <label class="rdiobox">
                    <input name="jk" value="100001" type="radio">
                    <span>Laki-Laki</span>
                  </label>    
                </div>
                <div class="col-lg-6">
                  <label class="rdiobox">
                    <input name="jk" value="100002" type="radio">
                    <span>Perempuan</span>
                  </label>
                </div>
              </div>
            </div>
          </div><!-- col-4 -->
          <div class="col-lg-6">
            <div class="form-group">
              <label class="form-control-label">Golongan Darah<span class="tx-danger">*</span></label>
              <label class="rdiobox">
                <input name="blood_type" type="radio" value="100001">
                <span>A</span>
              </label>
              <label class="rdiobox">
                <input name="blood_type" type="radio" value="100002">
                <span>B</span>
              </label>
              <label class="rdiobox">
                <input name="blood_type" type="radio" value="100003">
                <span>AB</span>
              </label>
              <label class="rdiobox">
                <input name="blood_type" type="radio" value="100004">
                <span>O</span>
              </label>
            </div>
          </div><!-- col-4 -->
        </div>

        <div class="row ">
          <div class="col-lg-6">
            <div class="form-group">
              <label class="form-control-label">Pendidikan Terakhir<span class="tx-danger">*</span></label>
              <select class="form-control select2" name="pendidikan" id="pendidikan">
                <option value="">Pendidikan Terkahir</option>
                <?php foreach ($pendidikan as $row): ?>
                <option value="<?= $row->idcode?>"><?= $row->short_name?></option>  
                <?php endforeach ?>
              </select>
            </div>
          </div><!-- col-4 -->
          <div class="col-lg-6">
            <div class="form-group">
              <label class="form-control-label">Pekerjaan<span class="tx-danger">*</span></label>
              <input class="form-control" type="text" name="pekerjaan" placeholder="Pekerjaan" id="pekerjaan">
            </div>
          </div><!-- col-4 -->
        </div>
         <div class="row ">
          <div class="col-lg-12">
            <div class="form-group">
              <label class="form-control-label">Alamat<span class="tx-danger">*</span></label>
              <input class="form-control" type="text" name="alamat" placeholder="Alamat" id="alamat">
            </div>
          </div><!-- col-4 -->
        </div>
        <div class="row ">
          <div class="col-lg-6">
            <div class="form-group">
              <label class="form-control-label">Kecamatan<span class="tx-danger">*</span></label>
              <select class="form-control select2" onchange="getregion(this.value,4)" name="kecamatan" id="kecamatan">
                <option value="">Kecamatan</option>
                <?php foreach ($kecamatan as $row): ?>
                <option value="<?= $row->id ?>"><?= $row->name?></option>
                  
                <?php endforeach ?>
              </select>
            </div>
          </div><!-- col-4 -->
          <div class="col-lg-6">
            <div class="form-group">
              <label class="form-control-label">Kelurahan<span class="tx-danger">*</span></label>
              <select class="form-control select2" name="kelurahan" id="kelurahan">
                <option value="">Kelurahan</option>
              </select>
            </div>
          </div><!-- col-4 -->
        </div>

    </div>
    <div class="col-md-5 offset-md-1">
      <div class="row ">
          <div class="col-lg-6">
            <div class="form-group">
              <label class="form-control-label">Jenis Kunjungan: <span class="tx-danger">*</span></label>
              <div class="row">
                <div class="col-lg-6">
                  <label class="rdiobox">
                    <input name="jkunjungan" type="radio" value="N">
                    <span>Rawat Jalan</span>
                  </label>    
                </div>
                <div class="col-lg-6">
                  <label class="rdiobox">
                    <input name="jkunjungan" type="radio" value="Y">
                    <span>Rawat Inap</span>
                  </label>
                </div>
              </div>
            </div>
          </div><!-- col-4 -->
        </div>
      <div class="row ">
          <div class="col-lg-12">
            <div class="form-group">
              <label class="form-control-label">Unit Pelayanan: <span class="tx-danger">*</span></label>
              <div class="row">
                <div class="col-lg-4">
                  <label class="rdiobox"><input name="unit" type="radio" value="100001"><span>BP. Umum</span></label>
                  <label class="rdiobox"><input name="unit" type="radio" value="100002"><span>BP. Gigi</span></label>
                  <label class="rdiobox"><input name="unit" type="radio" value="100003"><span>BP. Mata</span></label>
                  <label class="rdiobox"><input name="unit" type="radio" value="100004"><span>Poli Spesialis</span></label>
                  <label class="rdiobox"><input name="unit" type="radio" value="100005"><span>KIA Spesialis </span></label>
                </div>
                <div class="col-lg-4">
                  <label class="rdiobox"><input name="unit" type="radio" value="100006"><span>Laborat</span></label>
                  <label class="rdiobox"><input name="unit" type="radio" value="100007"><span>UGD</span></label>
                  <label class="rdiobox"><input name="unit" type="radio" value="100008"><span>Fisioterapi</span></label>
                  <label class="rdiobox"><input name="unit" type="radio" value="100009"><span>Gizi</span></label>
                  <label class="rdiobox"><input name="unit" type="radio" value="100010"><span>Kesling</span></label>
                </div>
                <div class="col-lg-4">
                  <label class="rdiobox"><input name="unit" type="radio" value="100011"><span>MTBS</span></label>
                  <label class="rdiobox"><input name="unit" type="radio" value="100012"><span>Imunisasi</span></label>
                  <label class="rdiobox"><input name="unit" type="radio" value="100013"><span>Poli TB</span></label>
                  <label class="rdiobox"><input name="unit" type="radio" value="100014"><span>KB</span></label>
                </div>
              </div>
            </div>
          </div><!-- col-4 -->
        </div>

        <div class="row">
          <div class="form-layout-footer">
            <button class="btn btn-primary bd-0" type="submit">Simpan</button>
            <button class="btn btn-secondary bd-0">Batal</button>
          </div><!-- form-layout-footer -->
        </div>
  
    </div>
    
  </div>

</div><!-- form-layout -->
    </form>
</div><!-- section-wrapper -->