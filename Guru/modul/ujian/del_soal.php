<?php 

$sql=mysqli_query($con,"DELETE FROM soal WHERE id_soal='$_GET[ids]' ");
	if ($sql) {
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
	window.location.replace('?page=ujian&act=soal&id=$_GET[id]');
	} ,3000);   
	</script>";
	}

 ?>