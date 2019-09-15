<div class="slim-pageheader">
  <ol class="breadcrumb slim-breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"><a href="#">Master Data</a></li>
    <li class="breadcrumb-item active" aria-current="page">Master Code</li>
  </ol>
  <h6 class="slim-pagetitle">Master Code</h6>
</div><!-- slim-pageheader -->

<div class="section-wrapper">
  <div class="row mg-b-20 mg-sm-b-40">
    <div class="col-md-4">
     <select class="form-control select2" data-placeholder="Master Data Category" onchange="getcode(this.value)">
        <option value="" label="Master Data Category"></option>
        <?php foreach ($code as $row): ?>
        <option value="<?= $row->idcode?>"> <?= $row->full_name?></option>
        <?php endforeach ?>
      </select> 
    </div>
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
          <th class="wd-15p">Short Name</th>
          <th class="wd-10p">Full Name</th>
          <th class="wd-25p">Desc</th>
          <th class="wd-25p">#</th>
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
            <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Tambah Code</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form class="form-add" action="#" method="post">
          <div class="modal-body pd-25">
              <div class="row mg-b-25">
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Code<span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="idcode" placeholder="Code">
                  <input class="form-control" id="add-idgroup" type="hidden" name="idgroup" placeholder="Code">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">BPJS Code</label>
                  <input class="form-control" type="text" name="bpjs_code" placeholder="BPJS Code">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Short Name</label>
                  <input class="form-control" type="text" name="short_name" placeholder="Short Name">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Full Name</label>
                  <input class="form-control" type="text" name="full_name" placeholder="Full Name">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Description</label>
                  <input class="form-control" type="text" name="remark" placeholder="Description">
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
                  <label class="form-control-label">Code<span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="idcode" id="idcode" placeholder="Code">
                  <input class="form-control" id="edit-idgroup" type="hidden" name="idgroup" placeholder="Code">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">BPJS Code</label>
                  <input class="form-control" type="text" name="bpjs_code" id="bpjs_code" placeholder="BPJS Code">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Short Name</label>
                  <input class="form-control" type="text" name="short_name" id="short_name" placeholder="Short Name">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Full Name</label>
                  <input class="form-control" type="text" name="full_name" id="full_name" placeholder="Full Name">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Description</label>
                  <input class="form-control" type="text" name="remark" id="remark" placeholder="Description">
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