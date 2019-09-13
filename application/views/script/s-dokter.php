<script type="text/javascript">
 var save_method;
  $(document).ready(function(){
     binding();
  });

  function binding(){
    $.ajax({
                type  : 'ajax',
                url   : '<?php echo site_url('C_Dokter/getall_dokter')?>',
                async : true,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                                '<td>'+data[i].kd_dokter+'</td>'+
                                '<td>'+data[i].nm_dokter+'</td>'+
                                '<td>'+data[i].jns_kelamin+'</td>'+
                                '<td>'+data[i].no_telepon+'</td>'+
                                '<td>'+data[i].sip+'</td>'+
                                '<td>'+data[i].spesialisasi+'</td>'+
                                '<td>'+data[i].nakes+'</td>'+
                                '<td style="text-align:right;">'+
                                    '<a href="javascript:void(0);" class="btn btn-info btn-sm" onclick="edit(\''+data[i].kd_dokter+'\')">Edit</a>'+' '+
                                    '<a href="javascript:void(0);" class="btn btn-danger btn-sm" onclick="del(\''+data[i].kd_dokter+'\')">Delete</a>'+
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
    $('.modal-title').text('Tambah Dokter');
  }

  function edit(id)
{
    save_method = 'update';
    $('#myForm')[0].reset(); // reset form on modals

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('C_Dokter/get_dokter')?>",
        type: "POST",
        data:{id:id},
        dataType: "JSON",
        success: function(data)
        {
          $('[name="kd_dokter"]').val(data.kd_dokter);
          $('[name="nm_dokter"]').val(data.nm_dokter);
          $('[name="jns_kelamin"]').val(data.jns_kelamin);
          $('[name="tempat_lahir"]').val(data.tempat_lahir);
          $('[name="tanggal_lahir"]').datepicker('update',data.tanggal_lahir);
          $('[name="alamat"]').val(data.alamat);
          $('[name="no_telepon"]').val(data.no_telepon);
          $('[name="sip"]').val(data.sip);
          $('[name="spesialisasi"]').val(data.spesialisasi);
          $('[name="nakes"]').val(data.nakes);
            $('#formModal').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Dokter'); // Set title to Bootstrap modal title

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
         url = "<?php echo site_url('C_Dokter/ins_dokter')?>";
     } else {
         url = "<?php echo site_url('C_Dokter/upd_dokter')?>";
     }

     // ajax adding data to database
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
  }
  function del(id){
    if(confirm('Apakah anda yakin untuk hapus data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('C_Dokter/del_dokter')?>",
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
