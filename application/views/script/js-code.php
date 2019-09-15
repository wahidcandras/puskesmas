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

        $('.select2').select2({
          minimumResultsForSearch: ''
        });
      });

      $('#add').on('shown.bs.modal', function () {
      		$('#add-idgroup').val($('.select2').val());
		});

      function getcode(e){
      	$.post("<?= site_url('Master/Code/getcode')?>",{e:e},function(data){
      		 $('#datatable2 > tbody').html('');
      		$.each(data, function(i, val) {
			    $('#datatable2 > tbody').append(""
			    	+'<tr>'
			    	+'<td>'+ val.idcode +'</td>'
			    	+'<td>'+ val.bpjs_code +'</td>'
			    	+'<td>'+ val.short_name +'</td>'
			    	+'<td>'+ val.full_name +'</td>'
			    	+'<td>'+ val.remark +'</td>'
			    	+'<td>'
			    	+'<button type="button" class="btn btn-primary btn-sm" onclick="edit_data(\''+val.idcode+'\')">Edit</button>'
			    	+'<button type="button" class="btn btn-danger btn-sm" onclick="delete_data(\''+val.idcode+'\')">Delete</button>'
			    	+'</td>'
			    	+'</tr>'
			    	);
			});
      	},"JSON");
      }

      $('.form-add').submit(function(event) {
        // process the form
        $.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : '<?php echo site_url('Master/Code/add') ?>', // the url where we want to POST
            data        : $('.form-add').serialize(), // our data object
            dataType    : 'json', // what type of data do we expect back from the server
            encode          : true
        })
            // using the done promise callback
            .done(function(data) {
            	if (data.status) {
            		getcode($('.select2').val());
            		$('#add').modal('hide');
            	}else{
            		alert(data.message);
            	}
            });

            event.preventDefault();
        });

      function edit_data(e){
      	 $.post("<?php echo site_url('Master/Code/getcode_detail') ?>",{idgroup:$('.select2').val(),idcode:e},
            function(data){
            	$('#edit-idgroup').val(data.idgroup);
            	$('#idcode').val(data.idcode);
            	$('#bpjs_code').val(data.bpjs_code);
            	$('#short_name').val(data.short_name);
            	$('#full_name').val(data.full_name);
            	$('#remark').val(data.remark);
                $('#edit').modal('show');
                console.log(data);
            },"JSON");
      }

       $('.form-edit').submit(function(event) {
        // process the form
        $.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : '<?php echo site_url('Master/Code/edit') ?>', // the url where we want to POST
            data        : $('.form-edit').serialize(), // our data object
            dataType    : 'json', // what type of data do we expect back from the server
            encode          : true
        })
            // using the done promise callback
            .done(function(data) {
            	if (data.status) {
            		getcode($('.select2').val());
            		$('#edit').modal('hide');
            	}else{
            		alert(data.message);
            	}
            });

            event.preventDefault();
        });

       function delete_data(e){
       	if (confirm('Apakah Anda Yakin')) {
       		 $.post("<?php echo site_url('Master/Code/delete') ?>",{idgroup:$('.select2').val(),idcode:e},
            function(data){
            	if (data.status) {
            		if (data.status) {
	            		getcode($('.select2').val());
	            	}else{
	            		alert(data.message);
	            	}
            	}
            },"JSON");
       	}else{

       	}
       }

    </script>