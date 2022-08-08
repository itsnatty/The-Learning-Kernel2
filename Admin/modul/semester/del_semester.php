<?php
$del = mysqli_query($con,"DELETE FROM tb_master_semester WHERE id_semester='$_GET[id]' ") or die(mysqli_error($con));
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
	window.location.replace('?page=semester');
	} ,3000);   
	</script>";
}

 ?>