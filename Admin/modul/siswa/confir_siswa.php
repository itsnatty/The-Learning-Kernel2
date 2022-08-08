<?php
$con = mysqli_query($con,"UPDATE tb_siswa SET aktif='Y',confirm='Yes' WHERE id_siswa='$_GET[id]' ") or die(mysqli_error($con));
if ($con) {	

	echo "
	<script type='text/javascript'>
setTimeout(function() {
swal({
title: 'CONFIRM SUCCESS',
text: 'Account is Active!',
type: 'success',
timers: 3000,
showConfirmButton: true
});
},10);
window.setTimeout(function(){
	window.location.replace('index.php');
	} ,3000);   
	</script>";
}

 ?>