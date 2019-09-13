<script type="text/javascript">
 var save_method;
  $(document).ready(function(){
     binding();
  });

  function binding(){
    $.ajax({
                type  : 'ajax',
                url   : '<?php echo site_url('C_Obat/getall_obat')?>',
                async : true,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                                '<td>'+data[i].kd_obat+'</td>'+
                                '<td>'+data[i].no_batch+'</td>'+
                                '<td>'+data[i].nm_obat+'</td>'+
                                '<td>'+data[i].harga_modal+'</td>'+
                                '<td>'+data[i].harga_jual+'</td>'+
                                '<td>'+data[i].stock+'</td>'+
                                '<td>'+data[i].expdate+'</td>'+
                                '<td>'+data[i].keterangan+'</td>'+
                                '<td style="text-align:right;">'+
                                    '<a href="javascript:void(0);" class="btn btn-info btn-sm" onclick="edit(\''+data[i].kd_obat+'\')">Edit</a>'+' '+
                                    '<a href="javascript:void(0);" class="btn btn-danger btn-sm" onclick="del(\''+data[i].kd_obat+'\')">Delete</a>'+
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
        url : "<?php echo site_url('C_Obat/get_obat')?>",
        type: "POST",
        data:{id:id},
        dataType: "JSON",
        success: function(data)
        {
          $('[name="kd_obat"]').val(data.kd_obat);
          $('[name="no_batch"]').val(data.no_batch);
          $('[name="nm_obat"]').val(data.nm_obat);
          $('[name="harga_modal"]').val(data.harga_modal);
          $('[name="harga_jual"]').val(data.harga_jual);
          $('[name="stock"]').val(data.stock);
          $('[name="expdate"]').datepicker('update',data.expdate);
          $('[name="keterangan"]').val(data.keterangan);
          $('[name="orderdate"]').val(data.orderdate);
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
         url = "<?php echo site_url('C_Obat/ins_obat')?>";
     } else {
         url = "<?php echo site_url('C_Obat/upd_obat')?>";
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
            url : "<?php echo site_url('C_Obat/del_obat')?>",
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
