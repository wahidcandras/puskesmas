<div class="page-inner">
                    <div class="page-title">
                        <h3 class="breadcrumb-header">Pendaftaran Pasien</h3>
                    </div>
                <div id="main-wrapper">
                                <form>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel panel-white">
                                <div class="panel-heading clearfix">
                                    <h4 class="panel-title inline-txt">Data Pasien</h4>
                                    <!-- <button class="btn btn-success pull-right" onclick="add()"><i class="fa fa-plus"></i> Tambah</button> -->
                                </div>
                                <div class="panel-body">
                                    <div class="form-group">
                                      <label for="exampleInputEmail1">Jenis Kunjungan</label>
                                      <div class="checkbox">
                                        <label>
                                          <input type="radio" name="jenisPasien">Pasien Baru
                                        </label>
                                        <label style="margin-left:3rem">
                                          <input type="radio" name="jenisPasien">Pasien Lama
                                        </label>
                                      </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                          <div class="form-group">
                                            <label for="exampleInputEmail1">Nomor RM</label>
                                            <div style="margin-bottom:15px;" class="input-group">
                                              <input type="text" class="form-control" placeholder="Nomor Rekam Medis">
                                              <span class="input-group-btn">
                                                <button class="btn btn-primary" type="button">Cari</button>
                                              </span>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label for="exampleInputEmail1">Nomor BPJS</label>
                                            <div style="margin-bottom:15px;" class="input-group">
                                              <input type="text" class="form-control" placeholder="Nomor BPJS">
                                              <span class="input-group-btn">
                                                <button class="btn btn-primary" type="button">Cari</button>
                                              </span>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-md-6">
                                          <div class="form-group">
                                            <label for="exampleInputEmail1">NIK</label>
                                            <div style="margin-bottom:15px;" class="input-group">
                                              <input type="text" class="form-control" placeholder="Nomor Induk Kependudukan">
                                              <span class="input-group-btn">
                                                <button class="btn btn-primary" type="button">Cari</button>
                                              </span>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label for="exampleInputEmail1">Nomor KK</label>
                                            <div style="margin-bottom:15px;" class="input-group">
                                              <input type="text" class="form-control" placeholder="Nomor Kartu Keluarga">
                                              <span class="input-group-btn">
                                                <button class="btn btn-primary" type="button">Cari</button>
                                              </span>
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                      <label for="exampleInputEmail1">Nama Pasien</label>
                                      <input type="text" class="form-control" placeholder="NIK">
                                    </div>
                                    <div class="form-group">
                                      <label for="exampleInputEmail1">Nomor HP</label>
                                      <input type="text" class="form-control" placeholder="Nomor HP">
                                    </div>
                                    <div class="form-group">
                                      <label for="exampleInputEmail1">Tanggal Lahir</label>
                                      <input type="text" class="form-control" placeholder="Tanggal Lahir">
                                    </div>
                                    <div class="form-group">
                                      <label for="exampleInputEmail1">Jenis Kelamin</label>
                                      <div class="checkbox">
                                        <label>
                                          <input type="radio" name="jenisKelamin">Laki-laki
                                        </label>
                                        <label style="margin-left:3rem">
                                          <input type="radio" name="jenisKelamin">Perempuan
                                        </label>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label for="exampleInputEmail1">Golongan Darah</label>
                                      <div class="checkbox">
                                        <label>
                                          <input type="radio" name="golDarah"> A
                                        </label>
                                        <label style="margin-left:3rem">
                                          <input type="radio" name="golDarah"> AB
                                        </label>
                                        <label style="margin-left:3rem">
                                          <input type="radio" name="golDarah"> B
                                        </label>
                                        <label style="margin-left:3rem">
                                          <input type="radio" name="golDarah"> O
                                        </label>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label for="exampleInputEmail1">Pendidikan</label>
                                          <select class="form-control">
                                            <option>SD</option>
                                            <option>SMP</option>
                                            <option>SMA</option>
                                            <option>Sarjana</option>
                                          </select>
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                       <div class="form-group">
                                        <label for="exampleInputEmail1">Pekerjaan</label>
                                        <input type="text" class="form-control" placeholder="Pekerjaan">
                                      </div>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label for="exampleInputEmail1">Alamat</label>
                                      <input type="text" class="form-control" placeholder="Alamat">
                                    </div>
                                    <div class="row">
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label for="exampleInputEmail1">Kecamatan</label>
                                          <select class="form-control">
                                            <option>Ambarawa</option>
                                          </select>
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label for="exampleInputEmail1">Kelurahan</label>
                                          <select class="form-control">
                                            <option>Ambarawa</option>
                                          </select>
                                        </div>
                                      </div>
                                    </div>
                                
                                   <!-- <div class="table-responsive">
                                    <table id="showTable" class="display table" style="width: 100%; cellspacing: 0;">
                                        <thead>
                                            <tr>
                                                <th style="width:50px">Kode Tarif</th>
                                                <th>Nama</th>
                                                <th>Jasa Klinik</th>
                                                <th>Jasa Nakes</th>
                                                <th>Total</th>
                                                <th style="width:120px">#</th>
                                            </tr>
                                        </thead>
                                        <tbody id="table-content">
                                        </tbody>
                                       </table>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                          <div class="panel panel-white">
                                <div class="panel-heading clearfix">
                                    <h4 class="panel-title inline-txt">Data Kunjungan</h4>
                                    <!-- <button class="btn btn-success pull-right" onclick="add()"><i class="fa fa-plus"></i> Tambah</button> -->
                                </div>
                                <div class="panel-body">
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Jenis perawatan</label>
                                    <div class="checkbox">
                                      <label>
                                        <input type="radio" name="jenisPerawatan">Rawat Jalan
                                      </label>
                                      <label style="margin-left:3rem">
                                        <input type="radio" name="jenisPerawatan">Rawat Inap
                                      </label>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Unit Pelayanan</label>
                                    <div class="row">
                                        <div class="col-md-4">
                                          <div class="checkbox">
                                            <label>
                                              <input type="radio" name="poli"> BP Umum
                                            </label>
                                          </div>
                                          <div class="checkbox">
                                            <label>
                                              <input type="radio" name="poli"> BP Gigi
                                            </label>
                                          </div>
                                          <div class="checkbox">
                                            <label>
                                              <input type="radio" name="poli"> BP Mata
                                            </label>
                                          </div>      
                                        </div>
                                        <div class="col-md-4">
                                           <div class="checkbox">
                                            <label>
                                              <input type="radio" name="poli"> Poli Spesialis
                                            </label>
                                          </div> 
                                           <div class="checkbox">
                                            <label>
                                              <input type="radio" name="poli"> KIA
                                            </label>
                                          </div>
                                           <div class="checkbox">
                                            <label>
                                              <input type="radio" name="poli"> Laborat
                                            </label>
                                          </div>  
                                        </div>
                                        <div class="col-md-4">
                                           <div class="checkbox">
                                            <label>
                                              <input type="radio" name="poli"> Poli Spesialis
                                            </label>
                                          </div> 
                                           <div class="checkbox">
                                            <label>
                                              <input type="radio" name="poli"> KIA
                                            </label>
                                          </div>
                                           <div class="checkbox">
                                            <label>
                                              <input type="radio" name="poli"> Laborat
                                            </label>
                                          </div>  
                                        </div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Kunjungan Sehat</label>
                                    <div class="checkbox">
                                      <label>
                                        <input type="radio" name="jenisKunjungan">Umum
                                      </label>
                                      <label style="margin-left:3rem">
                                        <input type="radio" name="jenisKunjungan">BPJS
                                      </label>
                                      <label style="margin-left:3rem">
                                        <input type="radio" name="jenisKunjungan">Luar Daerah
                                      </label>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <button class="btn btn-primary" type="submit">Simpan</button>
                                    <button class="btn btn-default" type="button">Batal</button>
                                    
                                  </div>
                                </div>
                          </div>
                        </div>
                    </div><!-- Row -->
                    </form>
                </div><!-- Main Wrapper -->
                <div class="page-footer">
                    <p>Made with <i class="fa fa-heart"></i> by stacks</p>
                </div>
                </div><!-- /Page Inner -->

                <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title"></h4>
                                </div>

                                <div class="modal-body">
                                  <form class="form-horizontal" action="#" id="myForm">
                                    <div class="form-group">
                                      <label class="col-sm-4 control-label">Kode Tarif</label>
                                      <div class="col-sm-8 ">
                                        <input type="text" name="kd_tarif" class="form-control" readonly>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-sm-4 control-label">Nama</label>
                                      <div class="col-sm-8 ">
                                        <input type="text" name="nm_tarif" class="form-control" >
                                      </div>
                                    </div>

                                    <div class="form-group">
                                      <label class="col-sm-4 control-label">Jasa Klinik</label>
                                      <div class="col-sm-8 ">
                                        <input type="text" name="jasa_klinik" class="form-control" onkeyup="sum()" value="0">
                                      </div>
                                    </div>

                                    <div class="form-group">
                                      <label class="col-sm-4 control-label">Jasa Nakes</label>
                                      <div class="col-sm-8 ">
                                        <input type="text" name="jasa_nakes" class="form-control" onkeyup="sum()" value="0">
                                      </div>
                                    </div>

                                    <div class="form-group">
                                      <label class="col-sm-4 control-label">Total</label>
                                      <div class="col-sm-8 ">
                                        <input type="text" name="total" class="form-control" readonly>
                                      </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                  <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                                  <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                </div>
                                </form>
                            </div>
                        </div>
                </div>
