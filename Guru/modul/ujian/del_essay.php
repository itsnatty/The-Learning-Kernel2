<?php 

$sql=mysqli_query($con,"DELETE FROM ujian_essay WHERE id_ujianessay='$_GET[id]' ");
	if ($sql) {

		$sql1=mysqli_query($con,"DELETE FROM kelas_ujianessay WHERE id_ujianessay='$_GET[id]' ");
				echo "
				<script type='text/javascript'>
setTimeout(function() {
swal({
title: 'Success',
text: 'Data Has Been Deleted!',
type: 'success',
timers: 3000,
showConfirmButton: true
});
},10);
window.setTimeout(function(){
window.location.replace('?page=ujian');
} ,3000);
</script>";
	}

 ?>