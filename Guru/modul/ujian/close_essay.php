<?php 

$close = mysqli_query($con,"UPDATE kelas_ujianessay SET aktif='N' WHERE id_ujianessay='$_GET[essayid]' ");

    if ($close) {
		echo "
		<script type='text/javascript'>
setTimeout(function() {
swal({
title: 'TEST CLOSED',
text: '',
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