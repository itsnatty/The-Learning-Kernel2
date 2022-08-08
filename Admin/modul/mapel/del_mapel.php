<?php
$del = mysqli_query($con,"DELETE FROM tb_master_mapel WHERE id_mapel='$_GET[id]' ") or die(mysqli_error($con));
if ($del) {	

	echo "
	<script type='text/javascript'>
	setTimeout(function() {
	swal({
	title: 'SUCCESS',
	text: 'Data has been deleted!!',
	type: 'success',
	timers: 3000,
	showConfirmButton: true
	});
	},10);
	window.setTimeout(function(){
	window.location.replace('?page=mapel');
	} ,3000);   
	</script>";
}

 ?>