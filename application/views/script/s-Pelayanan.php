<script src="<?php echo base_url().'/'?>assets/plugins/md5/jquery.md5.js"></script>
<script type="text/javascript">
 var save_method,encrypted;
  $(document).ready(function(){
     binding();
     var date = new Date();
      date.setDate(date.getDate());
     $('.date-pick').datepicker({
         format: 'yyyy-mm-dd',
         orientation: "top auto",
         autoclose: true,
         startDate: date
     });
  });

  function binding(){
    $.ajax({
                type  : 'ajax',
                url   : '<?php echo site_url('C_Daftar/getall_Daftar')?>',
                async : true,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                                '<td>'+data[i].no_antrian+'</td>'+
                                '<td>'+data[i].nomor_rm+'</td>'+
                                '<td>'+data[i].nm_pasien+'</td>'+
                                '<td>'+data[i].keluhan+'</td>'+
                                '<td style="text-align:right;">';

                        if (data[i].flag == 'N') {
                          html +='<a href="javascript:void(0);" class="btn btn-info btn-sm" onclick="edit(\''+data[i].no_daftar+'\')">Periksa</a>';
                        }else{
                          html +='<a href="javascript:void(0);" class="btn btn-info btn-sm" disabled>Periksa</a>';
                        }
                        html += '</td></tr>';
                    }
                    $('#table-content').html(html);
                    $('#showTable').dataTable();
                }

            });

            $.ajax({
                        type  : 'ajax',
                        url   : '<?php echo site_url('C_RM/getall_RM')?>',
                        async : true,
                        dataType : 'json',
                        success : function(data){
                            var html = '<option value="">Pilih Pasien</option>';
                            var i;
                            for(i=0; i<data.length; i++){
                                html += '<option value="'+data[i].nomor_rm+'">'+
                                        ''+data[i].nomor_rm+' - '+
                                        ''+data[i].nm_pasien+'</option>';
                            }
                            $('[name="nomor_rm"]').html(html);
                            $('.select2').select2({
                              dropdownParent: $("#formModal")
                            });
                        }
                    });


  }

  function add(){
    save_method = 'add';
     $('#myForm')[0].reset();
    $('#formModal').modal('show');
    $('.modal-title').text('Tambah Pendaftaran Pelayanan');
  }

  function edit(id)
{
    window.location="<?php echo site_url('Pemeriksaan/')?>"+id;
}
  function find(){
    var dt = $('[name="filter_tgl_daftar"]').val();
    $.ajax({
                type: "POST",
                url   : '<?php echo site_url('C_Daftar/filter_Daftar')?>',
                async : true,
                data : {dt:dt},
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                      html += '<tr>'+
                              '<td>'+data[i].no_antrian+'</td>'+
                              '<td>'+data[i].nomor_rm+'</td>'+
                              '<td>'+data[i].nm_pasien+'</td>'+
                              '<td>'+data[i].keluhan+'</td>'+
                              '<td style="text-align:right;">';

                      if (data[i].flag == 'N') {
                        html +='<a href="javascript:void(0);" class="btn btn-info btn-sm" onclick="edit(\''+data[i].no_daftar+'\')">Periksa</a>';
                      }else{
                        html +='<a href="javascript:void(0);" class="btn btn-info btn-sm" disabled>Periksa</a>';
                      }
                      html += '</td></tr>';
                    }
                    $('#table-content').html(html);
                    $('#showTable').dataTable();
                    $('#filterModal').modal('hide');
                }

            });
  }
  function save(){
     $('#btnSave').text('Saving...'); //change button text
     $('#btnSave').attr('disabled',true); //set button disable
     var url;
     if(save_method == 'add') {
         url = "<?php echo site_url('C_Daftar/ins_Daftar')?>";
     } else {
         url = "<?php echo site_url('C_Daftar/upd_Daftar')?>";
     }

    if ($('#myForm').valid()) {
      $.ajax({
          url : url,
          type: "POST",
          data: $('#myForm').serialize(),
          dataType: "JSON",
          success: function(data)
          {

              if(data.status) //if success close modal and reload ajax table
              {
                  $('#formModal').modal('hide');
                  binding();
              }
              $('#btnSave').text('Save'); //change button text
              $('#btnSave').attr('disabled',false); //set button enable


          },
          error: function (jqXHR, textStatus, errorThrown)
          {
              alert('Error adding / update data');
              $('#btnSave').text('Save'); //change button text
              $('#btnSave').attr('disabled',false); //set button enable

          }
      });
    }else{
      $('#btnSave').text('Save'); //change button text
      $('#btnSave').attr('disabled',false); //set button enable
    }
  }
  function del(id){
    if(confirm('Apakah anda yakin untuk hapus data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('C_Daftar/del_Daftar')?>",
            type: "POST",
            data : {id:id},
            dataType: "JSON",
            success: function(data)
            {
                binding();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });

    }
  }
  function getRM(id){
    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('C_RM/get_RM')?>",
        type: "POST",
        data:{id:id},
        dataType: "JSON",
        success: function(data)
        {
          $('[name="nm_pasien"]').val(data.nm_pasien);
          $('[name="no_bpjs"]').val(data.no_bpjs);
          $('[name="jns_kelamin"]').val(data.jns_kelamin);
          $('[name="alamat"]').val(data.alamat);
          $('[name="no_telepon"]').val(data.no_telepon);
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
  }
</script>
