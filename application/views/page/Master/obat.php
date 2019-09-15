<div class="slim-pageheader">
  <ol class="breadcrumb slim-breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"><a href="#">Master Data</a></li>
    <li class="breadcrumb-item active" aria-current="page">Master Obat</li>
  </ol>
  <h6 class="slim-pagetitle">Master Obat</h6>
</div><!-- slim-pageheader -->

<div class="section-wrapper">
  <div class="row mg-b-20 mg-sm-b-40">
    <div class="col-md-2">
      <button class="btn btn-primary btn-sm pd-y-13 pd-x-20 bd-0 mg-md-l-10 mg-t-10 mg-md-t-0" data-toggle="modal" data-target="#add">Tambah</button>
    </div>
  </div>

  <div class="table-wrapper">
    <table id="datatable2" class="table display responsive nowrap">
      <thead>
        <tr>
          <th class="wd-15p">Code</th>
          <th class="wd-20p">BPJS Code</th>
          <th class="wd-10p">Nama Obat</th>
          <th class="wd-10p">Satuan</th>
          <th class="wd-10p">#</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
  </div><!-- table-wrapper -->
</div><!-- section-wrapper -->

 <div id="add" class="modal fade">
      <div class="modal-dialog modal-dialog-vertical-center" role="document">
        <div class="modal-content bd-0 tx-14">
          <div class="modal-header">
            <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Tambah Obat</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form class="form-add" action="#" method="post">
          <div class="modal-body pd-25">
              <div class="row mg-b-25">
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Kode Obat<span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="id" placeholder="Kode Obat">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Kode BPJS</label>
                  <input class="form-control" type="text" name="bpjs_code" placeholder="Kode BPJS">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Nama Obat</label>
                  <input class="form-control" type="text" name="nama" placeholder="Nama Obat">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Satuan / Unit</label>
                  <input class="form-control" type="text" name="unit_cd" placeholder="Satuan / Unit Obat">
                </div>
              </div><!-- col-4 -->
            </div><!-- row -->
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          </div>
          </form>
        </div>
      </div><!-- modal-dialog -->
    </div><!-- modal -->

 <div id="edit" class="modal fade">
      <div class="modal-dialog modal-dialog-vertical-center" role="document">
        <div class="modal-content bd-0 tx-14">
          <div class="modal-header">
            <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Edit Kode</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form class="form-edit" action="#" method="post">
          <div class="modal-body pd-25">
              <div class="row mg-b-25">
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Kode Obat<span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="id" id="id_obat" placeholder="Kode Obat">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Kode BPJS</label>
                  <input class="form-control" type="text" name="bpjs_code" id="bpjs_code" placeholder="Kode BPJS">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Nama Obat</label>
                  <input class="form-control" type="text" name="nama" id="nama" placeholder="Nama Obat">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Satuan / Unit</label>
                  <input class="form-control" type="text" name="unit_cd" id="unit_cd" placeholder="Satuan / Unit Obat">
                </div>
              </div><!-- col-4 -->
            </div><!-- row -->
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          </div>
          </form>
        </div>
      </div><!-- modal-dialog -->
    </div><!-- modal -->