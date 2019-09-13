<script type="text/javascript">
 var save_method;
  $(document).ready(function(){
     binding();
  });

  function binding(){
    $.ajax({
                type  : 'ajax',
                url   : '<?php echo site_url('C_RM/getall_RM')?>',
                async : true,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                                '<td>'+data[i].nomor_rm+'</td>'+
                                '<td>'+data[i].nm_pasien+'</td>'+
                                '<td>'+data[i].jns_kelamin+'</td>'+
                                '<td>'+data[i].alamat+'</td>'+
                                '<td>'+data[i].no_telepon+'</td>'+
                                '<td>'+data[i].pekerjaan+'</td>'+
                                '<td>'+data[i].no_bpjs+'</td>'+
                                '<td style="text-align:right;">'+
                                    '<a href="javascript:void(0);" class="btn btn-info btn-sm" onclick="edit(\''+data[i].nomor_rm+'\')">Edit</a>'+' '+
                                    '<a href="javascript:void(0);" class="btn btn-danger btn-sm" onclick="del(\''+data[i].nomor_rm+'\')">Delete</a>'+
                                '</td>'+
                                '</tr>';
                    }
                    $('#table-content').html(html);
                    $('#showTable').dataTable();
                }

            });
  }

  function add(){
    save_method = 'add';
     $('#myForm')[0].reset();
    $('#formModal').modal('show');
    $('.modal-title').text('Tambah Rekam Medis');
  }

  function edit(id)
{
    save_method = 'update';
    $('#myForm')[0].reset(); // reset form on modals

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('C_RM/get_RM')?>",
        type: "POST",
        data:{id:id},
        dataType: "JSON",
        success: function(data)
        {

          $('[name="nomor_rm"]').val(data.nomor_rm);
          $('[name="nm_pasien"]').val(data.nm_pasien);
          $('[name="no_identitas"]').val(data.no_identitas);
          $('[name="no_bpjs"]').val(data.no_bpjs);
          $('[name="jns_kelamin"]').val(data.jns_kelamin);
          $('[name="gol_darah"]').val(data.gol_darah);
          $('[name="agama"]').val(data.agama);
          $('[name="tempat_lahir"]').val(data.tempat_lahir);
          $('[name="tanggal_lahir"]').datepicker('update',data.tanggal_lahir);
          $('[name="alamat"]').val(data.alamat);
          $('[name="no_telepon"]').val(data.no_telepon);
          $('[name="pekerjaan"]').val(data.pekerjaan);
          $('[name="status"]').val(data.keluarga_status);
          $('[name="keluarga_nama"]').val(data.keluarga_nama);
          $('[name="keluarga_identitas"]').val(data.keluarga_identitas);
          $('[name="keluarga_pekerjaan"]').val(data.keluarga_pekerjaan);
          $('[name="keluarga_telepon"]').val(data.keluarga_telepon);
            $('#formModal').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Rekam Medis'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

  function save(){
     $('#btnSave').text('Saving...'); //change button text
     $('#btnSave').attr('disabled',true); //set button disable
     var url;
     if(save_method == 'add') {
         url = "<?php echo site_url('C_RM/ins_RM')?>";
     } else {
         url = "<?php echo site_url('C_RM/upd_RM')?>";
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
            url : "<?php echo site_url('C_RM/del_RM')?>",
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
</script>
