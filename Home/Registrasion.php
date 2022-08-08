<?php include '../config/db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Registration</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="shortcut icon" type="image/png" href="../vendor/images/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/login/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../vendor/login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/login/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../vendor/login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="../vendor/login/css/main.css">
<!--===============================================================================================-->
<link rel="stylesheet" href="../vendor/node_modules/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../vendor/node_modules/simple-line-icons/css/simple-line-icons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../vendor/css/style.css">
  <!-- endinject -->
   <link href="../vendor/sweetalert/sweetalert.css" rel="stylesheet" />
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('../vendor/login/images/bg-01.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form action="" method="post" class="login100-form validate-form">
					<span class="login100-form-title p-b-49">
						<h2>REGISTER</h2>
						 <p class="text-danger">
             Student Account Registration
                              </p>
					</span>

					<div class="wrap-input100 validate-input m-b-23" data-validate = "Enter Username">
						<span for="no" class="label-input100 text-danger">Enter Username</span>
						<input class="input100" type="text" name="no" placeholder="Enter Username">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>
					
					
					<div class="wrap-input100 validate-input m-b-23" data-validate = "name must be filled">
						<span for="nama" class="label-input100 text-danger">Full name</span>
						<input class="input100" type="text" name="nama" placeholder="Fullname">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>
					
					<div class="wrap-input100 validate-input m-b-23" data-validate = "e-mail must be filled">
						<span for="email" class="label-input100 text-danger">E-MAIL</span>
						<input class="input100" type="text" name="email" placeholder="email">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>
					
					<div class="wrap-input100 validate-input m-b-23" data-validate = "password must be filled">
						<span for="password" class="label-input100 text-danger">Password</span>
						<input class="input100" type="text" name="password" placeholder="password">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>
					
					<div class="wrap-input100 validate-input m-b-23" data-validate = "password must be filled">
						<span for="password1" class="label-input100 text-danger">Password Confirmation</span>
						<input class="input100" type="text" name="password1" placeholder="Password Confirmation">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>
					
					<div class="wrap-input100 validate-input" data-validate="level is required">
						<span for="level" class="label-input100">Choose Level User</span>
						 <select name="level" class="form-control" required style="background-color: #212121;border-radius: 7px;color: #fff;font-weight: bold;">
                              <option value="">-- Choose Level --</option>
                             <!-- <option value="1"> Guru </option>-->
                              <option value="2"> Guru </option>
                               
                            </select>
					</div>
					
					<div class="wrap-input100 validate-input">
						<span for="kelas" class="label-input100">Choose Class</span>
						 <select id="kelas" name="kelas" class="form-control" required style="background-color: #212121;border-radius: 7px;color: #fff;font-weight: bold;">
                              <option>-- Choose Class --</option>
                              <?php
                  $sqlKelas=mysqli_query($con, "SELECT * FROM tb_master_kelas ORDER BY id_kelas DESC");
                  while($kelas=mysqli_fetch_array($sqlKelas)){
                  echo "<option value='$kelas[id_kelas]'>$kelas[kelas]</option>";
                  }
                  ?>
                               
                            </select>
					</div>
					
					<div class="wrap-input100 validate-input" data-validate="jurusan is required">
						<span for="jurusan" class="label-input100">Choose a major</span>
						 <select id="jurusan" name="jurusan" class="form-control" required style="background-color: #212121;border-radius: 7px;color: #fff;font-weight: bold;">
                              <option>-- Choose a major --</option>
                              <?php
                  $sqlJurusan=mysqli_query($con, "SELECT * FROM tb_master_jurusan ORDER BY id_jurusan DESC");
                  while($jur=mysqli_fetch_array($sqlJurusan)){
                  echo "<option value='$jur[id_jurusan]'>$jur[jurusan]</option>";
                  }
                  ?>
                               
                            </select>
					</div>
					
					<div class="wrap-input100 validate-input m-b-23" data-validate="jk is required">
						<span class="label-input100">Gender</span>
						 <select name="jk" class="form-control" required style="background-color: #212121;border-radius: 7px;color: #fff;font-weight: bold;">
                              <option value="">-- Choose Gender --</option>
                              <option value="L"> Male </option>
                              <option value="P"> Woman </option>
                               
                            </select>
					</div>
					
					
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button type="submit" name="Registration" class="login100-form-btn">
								REGISTER
							</button>
						</div>
					</div>

					
				</form>
			 <?php 

if (isset($_POST['Registrasi'])) {

  $no = $_POST['no'];
  $namaUser = $_POST['nama'];
  $email = $_POST['email'];
  $password = sha1($_POST['password']);
  $confirmasi = sha1($_POST['password1']);
  $level = $_POST['level'];
  $date = date('Y-m-d');

  // cek confirmasi password
  if ($password!=$confirmasi) {
       echo "
        <script type='text/javascript'>
        setTimeout(function () {
        swal({
        title: 'Fail',
        text:  'Confirm password does not match !',
        type: 'error',
        timer: 3000,
        showConfirmButton: true
        });     
        },10);  
        window.setTimeout(function(){ 
        window.location.replace('?pages=registration');
        } ,3000);   
        </script>";
  }else{

    if ($level==1) {
    // Simpan ke Tabel guru
      $sqlGuru= mysqli_query($con,"INSERT INTO tb_guru VALUES(NULL,'$no','$namaUser','$email','$password','default.png','N','$date','No') ") or die(mysqli_erro($con));
      if ($sqlGuru) {
      echo "
      <script type='text/javascript'>
        setTimeout(function () {
        swal({
        title: 'Success',
       text:  'Successful Teacher Registration, Please Wait For Confirmation from System Admin ..',
        type: 'success',
        timer: 3000,
        showConfirmButton: true
        });     
        },10);  
        window.setTimeout(function(){ 
        window.location.replace('../index.php');
        } ,3000);   
      </script>";
      }

    }else{
    
    $sqlSiswa= mysqli_query($con,"INSERT INTO tb_siswa
     VALUES(NULL,'$no','$namaUser','$_POST[jk]','$password','off','N','0','default.png','$_POST[kelas]','$_POST[jurusan]','No') ") or die(mysqli_erro($con));
        if ($sqlSiswa) {
      echo "
      <script type='text/javascript'>
        setTimeout(function () {
        swal({
        title: 'Success',
        text:  'Successful Student Registration, Please Wait For Confirmation from System Admin ..',
        type: 'success',
        timer: 3000,
        showConfirmButton: true
        });     
        },10);  
        window.setTimeout(function(){ 
        window.location.replace('../index.php');
        } ,3000);   
      </script>";
      }

    }
  }






}

 ?>      

			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="../vendor/login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/login/vendor/bootstrap/js/popper.js"></script>
	<script src="../vendor/login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/login/vendor/daterangepicker/moment.min.js"></script>
	<script src="../vendor/login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/login/js/main.js"></script>
	<script src="../vendor/node_modules/jquery/dist/jquery.min.js"></script>
  <script src="../vendor/node_modules/popper.js/dist/umd/popper.min.js"></script>
  <script src="../vendor/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="../vendor/sweetalert/sweetalert.min.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="../../vendor/js/off-canvas.js"></script>
  <script src="../../vendor/js/misc.js"></script>

</body>
</html>