<?php 

$aktif = mysqli_query($con,"UPDATE kelas_ujian SET aktif='Y' WHERE id_ujian='$_GET[ujian]' ");

    if ($aktif) {
		echo "
		<script type='text/javascript'>
		setTimeout(function() {
		swal({
		title: 'TEST IS ACTIVE',
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