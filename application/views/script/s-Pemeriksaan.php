<script type="text/javascript">
 var save_method;
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
     var $validator = $("#wizardForm").validate();
   //   var $validator = $("#wizardForm").validate({
   //     rules: {
   //         exampleInputName: {
   //             required: true
   //         },
   //         exampleInputName2: {
   //             required: true
   //     },
   //     exampleInputEmail: {
   //             required: true,
   //             email: true
   //     },
   //     exampleInputPassword1: {
   //             required: true
   //     },
   //     exampleInputPassword2: {
   //             required: true,
   //             equalTo: '#exampleInputPassword1'
   //     },
   //     exampleInputProductName: {
   //             required: true
   //     },
   //     exampleInputProductId: {
   //             required: true
   //     },
   //     exampleInputQuantity: {
   //             required: true
   //         },
   //     exampleInputCard: {
   //             required: true,
   //             number: true
   //     },
   //     exampleInputSecurity: {
   //             required: true,
   //             number: true
   //     },
   //     exampleInputHolder: {
   //             required: true
   //         },
   //     exampleInputExpiration: {
   //             required: true,
   //             date: true
   //         },
   //     exampleInputCsv: {
   //             required: true,
   //             number: true
   //         }
   //     }
   // });

   $('#rootwizard').bootstrapWizard({
       'tabClass': 'nav nav-tabs',
       onTabShow: function(tab, navigation, index) {
           var $total = navigation.find('li').length;
           var $current = index+1;
           var $percent = ($current/$total) * 100;
           $('#rootwizard').find('.progress-bar').css({width:$percent+'%'});
       },
       'onNext': function(tab, navigation, index) {
         if (index == 1) {
           addmaster();
           bind_tindakan();
         }else if(index == 2){
           bind_obat();
         }else if(index == 3){
           finish();
         }
           // var $valid = $("#wizardForm").valid();
           // if(!$valid) {
           //     $validator.focusInvalid();
           //     return false;
           // }
       },
       'onTabClick': function(tab, navigation, index) {
           // var $valid = $("#wizardForm").valid();
           // if(!$valid) {
           //     $validator.focusInvalid();
           //     return false;
           // }
       },
   });
  });

  function binding(){
    // BINDING DOKTER
            $.ajax({
                        type  : 'ajax',
                        url   : '<?php echo site_url('C_Dokter/getall_dokter_only')?>',
                        async : true,
                        dataType : 'json',
                        success : function(data){

                            var html = '<option value="">Pilih Dokter</option>';
                            var i;
                            for(i=0; i<data.length; i++){
                                html += '<option value="'+data[i].kd_dokter+'">'+
                                        ''+data[i].kd_dokter+' - '+
                                        ''+data[i].nm_dokter+'</option>';
                            }
                            $('[name="kd_dokter"]').html(html);
                            $('.select2').select2();
                            var kd_dokter = "<?php if(isset($rawat->kd_dokter)){echo $rawat->kd_dokter;} ?>";
                            $('[name="kd_dokter"]').val(kd_dokter).change();
                        }
                    });


    //BINDING TINDAKAN
    $.ajax({
                type  : 'ajax',
                url   : '<?php echo site_url('C_Tarif/getall_Tarif')?>',
                async : true,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                                '<td>'+data[i].kd_tarif+'</td>'+
                                '<td>'+data[i].nm_tarif+'</td>'+
                                '<td>'+data[i].total+'</td>'+
                                '<td style="text-align:right;">'+
                                    '<a href="javascript:void(0);" class="btn btn-info btn-sm " onclick="addTindakan(\''+data[i].kd_tarif+'\',\'T\')">Tambah</a>'+
                                '</td>'+
                                '</tr>';
                    }
                    $('#table-tindakan').html(html);
                    $('#showTable').dataTable();
                }

            });


                //BINDING OBAT
                $.ajax({
                            type  : 'ajax',
                            url   : '<?php echo site_url('C_Obat/getall_Stock_Obat')?>',
                            async : true,
                            dataType : 'json',
                            success : function(data){
                                var html = '';
                                var i;
                                for(i=0; i<data.length; i++){
                                    html += '<tr>'+
                                            '<td class="nr">'+data[i].no_batch+'</td>'+
                                            '<td>'+data[i].nm_obat+'</td>'+
                                            '<td>'+data[i].stock+'</td>'+
                                            '<td>'+data[i].harga_jual+'</td>'+
                                            '<td><input type="text" class="form-control"></td>'+
                                            '<td style="text-align:right;">'+
                                                '<a href="javascript:void(0);" class="btn btn-info btn-sm" onclick="addObat(\''+data[i].no_batch+'\')"><i class="fa fa-plus"></i></a>'+
                                            '</td>'+
                                            '</tr>';
                                }
                                $('#table-obat').html(html);
                                $('#tbl-obat').dataTable();
                            }

                        });


  }

  function bind_tindakan(){
    var no_rawat = $('[name="no_rawat"]').val();
    var total = 0;
    $.ajax({
                type  : 'POST',
                url   : '<?php echo site_url('C_Pemeriksaan/getall_tindakan')?>',
                async : true,
                data:{no_rawat:no_rawat},
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                                '<td>'+(i+1)+'</td>'+
                                '<td>'+data[i].nm_tarif+'</td>'+
                                '<td> Rp '+data[i].total+'</td>'+
                                '<td style="text-align:right;">'+
                                    '<a href="javascript:void(0);" class="btn btn-danger btn-sm" onclick="delTindakan(\''+data[i].detid+'\',\'T\')"><i class="fa fa-trash"></i></a>'+
                                '</td>'+
                                '</tr>';
                                total += parseInt(data[i].total);
                    }
                    html += '<tr>'+
                          '<td colspan="2" style="text-align:center">TOTAL</td>'+
                          '<td colspan="2"> Rp '+total+'</td>'+
                    '</tr>';


                    $('#list-tindakan').html(html);
                }

            });
  }

  function bind_obat(){
    var no_rawat = $('[name="no_rawat"]').val();
    var total = 0;
    $.ajax({
                type  : 'POST',
                url   : '<?php echo site_url('C_Pemeriksaan/getall_obat')?>',
                async : true,
                data:{no_rawat:no_rawat},
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                                '<td>'+(i+1)+'</td>'+
                                '<td>'+data[i].no_batch+' - '+data[i].nm_obat +'</td>'+
                                '<td>'+data[i].qty+'</td>'+
                                '<td> Rp '+data[i].harga_total+'</td>'+
                                '<td style="text-align:right;">'+
                                    '<a href="javascript:void(0);" class="btn btn-danger btn-sm" onclick="delTindakan(\''+data[i].detid+'\',\'T\')"><i class="fa fa-trash"></i></a>'+
                                '</td>'+
                                '</tr>';
                                total += parseInt(data[i].harga_total);
                    }
                    html += '<tr>'+
                          '<td colspan="2" style="text-align:center">TOTAL</td>'+
                          '<td colspan="2"> Rp '+total+'</td>'+
                    '</tr>';


                    $('#list-obat').html(html);
                }

            });
  }

  function addmaster(){
  var no_rawat = $('[name="no_rawat"]').val();
  var nomor_rm = $('[name="nomor_rm"]').val();
  var no_daftar = $('[name="no_daftar"]').val();
  var pemeriksaan = $('[name="pemeriksaan"]').val();
  var diagnosis = $('[name="diagnosis"]').val();
  var icd = $('[name="icd"]').val();
  var kd_dokter = $('[name="kd_dokter"]').val();
    if (no_rawat == "") {
      $.ajax({
                  type  : 'POST',
                  url   : '<?php echo site_url('C_Pemeriksaan/ins_master')?>',
                  async : true,
                  data:{
                        nomor_rm:nomor_rm,
                        no_daftar:no_daftar,
                        pemeriksaan:pemeriksaan,
                        diagnosis:diagnosis,
                        icd:icd,
                        kd_dokter:kd_dokter
                  },
                  dataType: "JSON",
                  success : function(data){
                    if(data.status) //if success close modal and reload ajax table
                    {
                        $('[name="no_rawat"]').val(data.no_rawat);
                    }
                  },
                  error: function (jqXHR, textStatus, errorThrown)
                  {
                      alert('Error Insert Pemeriksaan');
                  }

              });
    }

  }

  function addTindakan(id,tipe){
    var no_rawat = $('[name="no_rawat"]').val();
    $.ajax({
          type  : 'POST',
          url   : '<?php echo site_url('C_Pemeriksaan/ins_det')?>',
          async : true,
          data:{
                no_rawat:no_rawat,
                id:id,
                tipe:tipe,
                qty:0,
                harga_total:0
          },
          dataType: "JSON",
          success : function(data){
            if(data.status) //if success close modal and reload ajax table
            {
              bind_tindakan();
            }

          },
          error: function (jqXHR, textStatus, errorThrown)
          {

          }

      });
  }

  function addObat(batch){
      var j = document.getElementById("tbl-obat");
      var len=j.rows.length;
      var no_rawat = $('[name="no_rawat"]').val();

      for (var f=1;f<len;f++){
        var q = j.rows[f].cells;
        if (q[0].innerHTML == batch) {
            var stock  = parseInt(q[2].innerHTML);
            var qty = parseInt(q[4].children[0].value);
            if (stock < qty) {
              alert("Stock Obat Kurang");
              q[4].children[0].value=0;
            }else{

              if(qty <= 0 || Number.isNaN(qty)){
                alert("Qty Tidak Boleh Kosong / 0 ");
                q[4].children[0].value=0;
              }else{
                $.ajax({
                      type  : 'POST',
                      url   : '<?php echo site_url('C_Pemeriksaan/ins_det')?>',
                      async : true,
                      data:{
                            no_rawat:no_rawat,
                            id:batch,
                            tipe:'O',
                            qty:qty,
                            harga_total:parseInt(qty*q[3].innerHTML)
                      },
                      dataType: "JSON",
                      success : function(data){
                        if(data.status) //if success close modal and reload ajax table
                        {
                          bind_obat();
                          binding();
                        }

                      },
                      error: function (jqXHR, textStatus, errorThrown)
                      {

                      }

                  });
              }


            }

        }

      }
  }

  function delTindakan(id){
    if(confirm('Apakah anda yakin untuk hapus data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('C_Pemeriksaan/del_Tindakan')?>",
            type: "POST",
            data : {id:id},
            dataType: "JSON",
            success: function(data)
            {
                bind_tindakan();
                bind_obat();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });

    }
  }

  function finish(){
    var no_rawat = $('[name="no_daftar"]').val();
    $.ajax({
          type  : 'POST',
          url   : '<?php echo site_url('C_Pemeriksaan/finish')?>',
          async : true,
          data:{
                no_rawat:no_rawat
          },
          dataType: "JSON",
          success : function(data){
            if(data.status) //if success close modal and reload ajax table
            {
            }

          },
          error: function (jqXHR, textStatus, errorThrown)
          {

          }

      });
  }
  function edit(id)
{
    save_method = 'update';
    $('#myForm')[0].reset(); // reset form on modals

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('C_Daftar/get_Daftar')?>",
        type: "POST",
        data:{id:id},
        dataType: "JSON",
        success: function(data)
        {
          $('[name="no_daftar"]').val(data.no_daftar);
          $('[name="nomor_rm"]').val(data.nomor_rm).change();
          $('[name="tgl_daftar"]').datepicker('update',data.tgl_daftar);
          $('[name="keluhan"]').val(data.keluhan);
          $('[name="no_antrian"]').val(data.no_antrian);
          $('[name="flag"]').val(data.flag);
            $('#formModal').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Pendaftaran Pelayanan'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
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
                                '<td>'+data[i].no_daftar+'</td>'+
                                '<td>'+data[i].nomor_rm+'</td>'+
                                '<td>'+data[i].nm_pasien+'</td>'+
                                '<td>'+data[i].tgl_daftar+'</td>'+
                                '<td>'+data[i].keluhan+'</td>'+
                                '<td>'+data[i].no_antrian+'</td>'+
                                '<td>'+data[i].flag+'</td>'+
                                '<td style="text-align:right;">'+
                                    '<a href="javascript:void(0);" class="btn btn-info btn-sm" onclick="edit(\''+data[i].no_daftar+'\')">Edit</a>'+' '+
                                    '<a href="javascript:void(0);" class="btn btn-danger btn-sm" onclick="del(\''+data[i].no_daftar+'\')">Delete</a>'+
                                '</td>'+
                                '</tr>';
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
