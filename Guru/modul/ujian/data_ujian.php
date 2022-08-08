<div class="content-wrapper">
<h4>
 <b>EVALUATION</b>
<small class="text-muted">/
EXAM
</small>
</h4>
   <div class="row purchace-popup">
                <div class="col-md-12 col-xs-12">
                  <span class="d-flex alifn-items-center">
                 <a class="btn btn-dark" data-toggle="modal" data-target="#addUjian"> <i class="fa fa-plus"></i> Add Examn</a>
                  </span>
                </div>
              </div>
<div class="row">

	<div class="col-md-12 col-xs-12">

  <div class="alert alert-info alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>STEP HINTS!</strong> <br> 
  <ul>
  <li>Click <b>create questions</b> to add questions.</li>
<li> Click <b>Select Class</b> To add a class that will be tested and automatically activated after selecting a class.</li>
    <li>Click <b>Exam Status</b> To Open and Close Exam. </li>
    <li>The exam will be active on the Student page, If you set the <b>date</b> on the day on which the exam will be held and the exam status <b>Active</b></li>
    <li>To monitor students who are taking exams, you can select the yellow button in the Exam status column</li>
  </ul>

   
  </div>

               <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Exam Data</h4>
                   <p class="card-description">

                  </p>
                    
                  <div class="table-responsive">
                  <table class="table table-striped table-hover table-condensed" id="data">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Subject</th>
                        <th>Type of Question</th>
                        <th>Type Question</th>
                        <th>Exam Date</th>
                        <th>Problem</th>
                        <th>Exam Status</th>
<th>Select Exam Class</th>
                        <th>Options</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $no=1;
                    $sqlrole = mysqli_query($con,"SELECT * FROM ujian
                    INNER JOIN tb_jenisujian ON ujian.id_jenis=tb_jenisujian.id_jenis
                    INNER JOIN tb_master_mapel ON ujian.id_mapel=tb_master_mapel.id_mapel
                    INNER JOIN tb_master_semester ON ujian.id_semester=tb_master_semester.id_semester
                    WHERE ujian.id_guru='$sesi' ORDER BY id_ujian DESC");
                    foreach ($sqlrole as $row) { ?>       

                      <tr>
                      
                        <td><?=$no++; ?>.</td>
                        <td><?=$row['mapel']; ?> </td>
                        <td><a href="?page=ujian&act=soal&id=<?=$row['id_ujian']; ?>"><b class="text-primary"> <em>OBJECTIVE
                        </em></b></a></td>
                        <td><?=$row['acak']; ?></td>
                        <td><b><?=date('d-F-Y',strtotime($row['tanggal'])); ?></b></td>
                        <td> 
                          <?php $jmlSoal = mysqli_num_rows(mysqli_query($con,"SELECT * FROM soal WHERE id_ujian='$row[id_ujian]' ")) ?>
                          <a href="?page=ujian&act=soal&id=<?=$row['id_ujian']; ?>" class="btn btn-primary btn-sm text-white">Create Questions ( <b><?=$jmlSoal; ?></b> )</a>
                      </td>
                           <td>
                  
                            <!-- cek ujian ini di kelas ujian -->
                            <?php 
                                $klsu= mysqli_query($con,"SELECT * FROM kelas_ujian WHERE id_ujian='$row[id_ujian]' AND aktif='Y' ");
                                 $jml = mysqli_num_rows($klsu);
                                // foreach ($klsu as $u)
                                  if ($jml >0) {
                                    ?>
                                    <!-- <a class="badge badge-pill badge-primary"> Aktif</a> -->
                                    <a data-toggle="modal" data-target="#tutup<?=$row['id_ujian']; ?>" class="btn btn-success btn-sm text-white"><i class="fa fa-check-square-o"></i> Active </a>
                                    <a href="?page=ujian&act=status&id=<?=$row['id_ujian'] ?>" class="btn btn-warning btn-sm text-black"><i class="fa fa-eye text-black"></i></a>
                                    <!-- MODAL TUTUP UJIAN -->
                                    <div class="modal fade" id="tutup<?=$row['id_ujian']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h4 class="modal-title">
                                            <center>
                                            Do You Want to <b>Disable</b> This Exam <br> Now ?
                                            </center>
                                          </h4>
                                        </div>
                                        <div class="modal-body">                                    
                                           <center>
                                             <a href="?page=ujian&act=close&ujian=<?php echo $row['id_ujian']; ?>" class="btn btn-dark"><i class="fa fa-check-square-o"></i> Yes</a>

                                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-window-close-o"></i> No</button>
                                           </center>
                                        </div>
                                      
                                      </div>
                                    </div>
                                  </div>

                                    <?php
                                  }else{
                                    ?>
                                    <!-- <a class="badge badge-pill badge-warning">Tidak Aktif</a> -->
                                    <a data-toggle="modal" data-target="#Aktif<?=$row['id_ujian']; ?>" class="btn btn-danger btn-sm text-white"><i class="fa fa-window-close-o"></i> Closed </a> 
                                           <!-- Modal Aktifkan ujian -->
                                  <div class="modal fade" id="Aktif<?=$row['id_ujian']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h4 class="modal-title">
                                            <center>
                                            Do You Want <b>Activate</b> This Exam Now ?
                                            </center>
                                          </h4>
                                        </div>
                                        <div class="modal-body">                                    
                                           <center>
                                             <a href="?page=ujian&act=active&ujian=<?php echo $row['id_ujian']; ?>" class="btn btn-dark"><i class="fa fa-check-square-o"></i> Yes</a>

                                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-window-close-o"></i> No</button>
                                           </center>
                                        </div>
                                      
                                      </div>
                                    </div>
                                  </div>
                                    <?php
                                  }                              
                                 
                             ?> 

                        </td>
						
						<td><a data-toggle="modal" data-target="#kelasUjian<?=$row['id_ujian']; ?>" class="btn btn-dark btn-sm text-warning"><i class="fa fa-graduation-cap"></i>Choose Class </a></td>
						
                        <td>
                          

                           <!-- Modal -->
                            <div class="modal fade" id="kelasUjian<?=$row['id_ujian']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content" style="overflow:scroll;height=600px;">
                                  <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel">EXAM CLASS SETTINGS</h4>
                                  </div>
                                   <form  method=POST enctype='multipart/form-data' action=?page=proses>
                                  <div class="modal-body">                                       
                                <input type="hidden" name="id" value="<?=$row[id_ujian]; ?>">
                                <p>
                                      <h4><b>CLASS AVAILABLE</b></h4>
                                    </p>
                                  <table class='table'>
                                  <thead>
                                  <tr>
                                    <th>Name of Class & Department</th>
                                    <th></th>
                                  </tr>
                                  </thead>
                                <tbody>
                                  <?php
                                  // kelas yg dimiliki oleh guru
                                  $kelasguru = mysqli_query($con,"SELECT * FROM tb_roleguru
                                  INNER JOIN tb_master_kelas ON tb_roleguru.id_kelas=tb_master_kelas.id_kelas
                                  INNER JOIN tb_master_jurusan ON tb_roleguru.id_jurusan=tb_master_jurusan.id_jurusan
                                  WHERE tb_roleguru.id_guru='$sesi' GROUP BY tb_roleguru.id_jurusan,tb_roleguru.id_kelas");
                                  foreach ($kelasguru as $kg) { ?>
                                  <tr>
                                    <td>
                                      <!-- <?=$kg['kelas'] ?>-
                                      <?=$kg['jurusan'] ?> -->

                                      <label class="form-check-label">
                                    <input type="checkbox" value="<?=$kg['id_kelas']; ?>" name="kelas[]">
                                    CLASS <?=$kg['kelas']; ?>
                                    </label>
                                    <label class="form-check-label">
                                    <input type="checkbox" value="<?=$kg['id_jurusan']; ?>" name="jurusan[]">
                                    <?=$kg['jurusan']; ?>
                                    </label>
                                    </td>
                                    <td>
                                      <a href="?page=ujian&act=addkelasujian&ujian=<?=$row['id_ujian']; ?>&kelas=<?=$kg['id_kelas']; ?>&jurusan=<?=$kg['id_jurusan']; ?>" class="btn btn-info btn-xs">Choose</a>
                                    </td>
                                  </tr>
                                  <?php } ?>
                                </tbody>
                                <tr>
                                  <td colspan="2">
                                  <button name="kelasujianSave" type="submit" class="btn btn-primary btn-xs">Save</button>
                                  </td>
                                </tr> 
                                  </table>

                                    <p>
                                      <h4><b>SELECTED CLASS</b></h4>
                                    </p>
                                  <table class="table">
                                  <thead>
                                  <tr>
                                    <th>Name of Class & Department</th>
                                    <th></th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                    <?php 
                                    // tampilkan kelas yg telah terpilih
                                    $klsujian = mysqli_query($con,"SELECT * FROM kelas_ujian
                                    INNER JOIN tb_master_kelas ON kelas_ujian.id_kelas=tb_master_kelas.id_kelas
                                    INNER JOIN tb_master_jurusan ON kelas_ujian.id_jurusan=tb_master_jurusan.id_jurusan
                                    WHERE id_ujian='$row[id_ujian]' ");
                                    foreach ($klsujian as $ku) { ?>
                                    <tr>
                                      <td> <?=$ku['kelas']; ?>-<?=$ku['jurusan']; ?> </td>
                                      <td> 
                                        <a href="?page=ujian&act=delkelas&id=<?=$ku['id_klsujian']; ?>" class="btn btn-danger btn-xs">Wipe</a>

                                      </td>
                                    </tr>
                                    <?php }?>
                                    </tbody>

                                  </table>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                   
                                  </div>
                                    </form>
                                </div>
                              </div>
                            </div>


                        <a href="?page=ujian&act=ujianedit&id=<?=$row['id_ujian']; ?>" class="btn btn-dark btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                          <a href="?page=ujian&act=ujiandel&id=<?=$row['id_ujian']; ?>" onclick="return confirm('Yakin Hapus Data ?')" class="btn btn-dark btn-sm text-danger"><i class="fa fa-trash"></i> Del </a>
                        </td>

                      </tr>
                    <?php } ?>

                   </tbody>
                  

                 </table>
                  </div>


               </div>
             </div>
	


</div>

</div>
</div>



<!-- Modal -->
<div class="modal fade" id="addUjian" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">
        <center>
            Please Choose the Type of Question Below!
          </center>
        </h4>
      </div>
      <div class="modal-body">
       <center>
         <a href="?page=ujian&act=add" class="btn btn-dark btn-lg"><i class="fa fa-check-square-o"></i> OBJECTIVE</a>
       <!-- <a href="?page=ujian&act=addessay" class="btn btn-primary btn-lg"><i class="fa fa-pencil"></i> ESSAY</a> -->
       </center>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>