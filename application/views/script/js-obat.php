 <script>
      $(function(){
        'use strict';

          $('#datatable2').DataTable({
          bLengthChange: false,
          searching: true,
          responsive: true
        });

        // Select2
        $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

        binding();
      });

      $('#add').on('shown.bs.modal', function () {
      		$('#add-idgroup').val($('.select2').val());
		});

      function binding(){
      	$.post("<?= site_url('Master/Obat/binding')?>",function(data){
          $("#datatable2").dataTable().fnDestroy();

      		 $('#datatable2 > tbody').html('');
      		$.each(data, function(i, val) {
			    $('#datatable2 > tbody').append(""
			    	+'<tr>'
			    	+'<td>'+ val.id +'</td>'
			    	+'<td>'+ val.bpjs_code +'</td>'
			    	+'<td>'+ val.nama +'</td>'
			    	+'<td>'+ val.unit_cd +'</td>'
			    	+'<td>'
			    	+'<button type="button" class="btn btn-primary btn-sm" onclick="edit_data(\''+val.id+'\')">Edit</button>'
			    	+'<button type="button" class="btn btn-danger btn-sm" onclick="delete_data(\''+val.id+'\')">Delete</button>'
			    	+'</td>'
			    	+'</tr>'
			    	);
			});
          setTimeout(function(){ 
           $('#datatable2').DataTable({
            bLengthChange: false,
            searching: true,
            responsive: true
          });
         }, 100);

      
      	},"JSON");
      }

      $('.form-add').submit(function(event) {
        // process the form
        $.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : '<?php echo site_url('Master/Obat/add') ?>', // the url where we want to POST
            data        : $('.form-add').serialize(), // our data object
            dataType    : 'json', // what type of data do we expect back from the server
            encode          : true
        })
            // using the done promise callback
            .done(function(data) {
            	if (data.status) {
            		$('#add').modal('hide');
            	}else{
            		alert(data.message);
            	}
            });

            event.preventDefault();
        });

      function edit_data(e){
      	 $.post("<?php echo site_url('Master/Obat/get_by_id') ?>",{id:e},
            function(data){
            	$('#id_obat').val(data.id);
            	$('#bpjs_code').val(data.bpjs_code);
            	$('#nama').val(data.nama);
            	$('#unit_cd').val(data.unit_cd);
                $('#edit').modal('show');
                console.log(data);
            },"JSON");
      }

       $('.form-edit').submit(function(event) {
        // process the form
        $.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : '<?php echo site_url('Master/Obat/edit') ?>', // the url where we want to POST
            data        : $('.form-edit').serialize(), // our data object
            dataType    : 'json', // what type of data do we expect back from the server
            encode          : true
        })
            // using the done promise callback
            .done(function(data) {
            	if (data.status) {
                binding();
            		$('#edit').modal('hide');
            	}else{
            		alert(data.message);
            	}
            });

            event.preventDefault();
        });

       function delete_data(e){
       	if (confirm('Apakah Anda Yakin')) {
       		 $.post("<?php echo site_url('Master/Obat/delete') ?>",{id:e},
            function(data){
            		if (data.status) {
                  binding();
	            	}else{
	            		alert(data.message);
	            	}
            	},"JSON");
       	}else{

       	}
       }

    </script>