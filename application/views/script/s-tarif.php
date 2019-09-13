<script type="text/javascript">
 var save_method;
  $(document).ready(function(){
     binding();
  });

  function binding(){
    $.ajax({
                type  : 'ajax',
                url   : '<?php echo site_url('C_Tarif/getall_tarif')?>',
                async : true,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                                '<td>'+data[i].kd_tarif+'</td>'+
                                '<td>'+data[i].nm_tarif+'</td>'+
                                '<td>'+data[i].jasa_klinik+'</td>'+
                                '<td>'+data[i].jasa_nakes+'</td>'+
                                '<td>'+data[i].total+'</td>'+
                                '<td style="text-align:right;">'+
                                    '<a href="javascript:void(0);" class="btn btn-info btn-sm" onclick="edit(\''+data[i].kd_tarif+'\')">Edit</a>'+' '+
                                    '<a href="javascript:void(0);" class="btn btn-danger btn-sm" onclick="del(\''+data[i].kd_tarif+'\')">Delete</a>'+
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
    $('.modal-title').text('Tambah Obat');
  }

  function edit(id)
{
    save_method = 'update';
    $('#myForm')[0].reset(); // reset form on modals

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('C_Tarif/get_tarif')?>",
        type: "POST",
        data:{id:id},
        dataType: "JSON",
        success: function(data)
        {
          $('[name="kd_tarif"]').val(data.kd_tarif);
          $('[name="nm_tarif"]').val(data.nm_tarif);
          $('[name="jasa_klinik"]').val(data.jasa_klinik);
          $('[name="jasa_nakes"]').val(data.jasa_nakes);
          $('[name="total"]').val(data.total);
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
         url = "<?php echo site_url('C_Tarif/ins_tarif')?>";
     } else {
         url = "<?php echo site_url('C_Tarif/upd_tarif')?>";
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
            url : "<?php echo site_url('C_Tarif/del_tarif')?>",
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

  function sum(){
    var a = $('[name="jasa_nakes"]').val();
    var b = $('[name="jasa_klinik"]').val();
    $('[name="total"]').val(parseInt(a)+parseInt(b));
  }
</script>
