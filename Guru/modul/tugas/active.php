<?php 

$aktif = mysqli_query($con,"UPDATE kelas_tugas SET aktif='Y' WHERE id_tugas='$_GET[tugas]' ");

    if ($aktif) {
		echo "
		<script type='text/javascript'>
		setTimeout(function() {
		swal({
		title: 'CLASS IS ACTIVE',
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