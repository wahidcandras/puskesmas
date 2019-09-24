<script type="text/javascript">
	$(document).ready(function(){
		$('.select2-minimum').select2({
			minimumResultsForSearch: Infinity
		});
		$('.select2').select2();
	});

	function getregion(id,level){
		console.log(id +'-'+ level);
		$.post('<?= site_url('Pelayanan/Registrasi/GetRegion')?>',{id:id,level:level},function(data){
			$('#kelurahan').html('');
			$('#kelurahan').append('<option value="">Kelurahan</option>');
			$.each(data, function(k, v) {

			$('#kelurahan').append('<option value="'+ v.id+'">'+v.name+'</option>');
			    /// do stuff
			});
		},"JSON");
	}

	function searchByRM(){
		var rm = $('#norm').val();
		$.post("<?= site_url('Pelayanan/Registrasi/getByRM')?>",{id:rm},function(data){
			$('#norm').val(data.id);
			$('#noktp').val(data.nik);
			$('#nobpjs').val(data.bpjs_no);
			$('#nama').val(data.nama);
			$('#birth_dt').val(data.birth_dt);
			$('#nohp').val(data.phone);
			$('#pekerjaan').val(data.work);
			$('#alamat').val(data.alamat);
			$('#pasien_type').val(data.pasien_type).change();
			$('#pendidikan').val(data.education).change();
			$('#kecamatan').val(data.district).change();
			setTimeout(function(){ $('#kelurahan').val(data.village).change(); }, 2000);
			$("input[name=pasien][value=0]").prop('checked', true);
			$("input[name=jk][value=" + data.sex + "]").prop('checked', true);
			$("input[name=blood_type][value=" + data.blood_type + "]").prop('checked', true);
			
			console.log(data);
		},"JSON");
	}
</script>