<?php require_once("head-admin.php") ?>

<?php
require_once('init/index.php');
require_once('init/init.php');
// $target_dir = "uploads/";
// $gambar = $target_dir . basename($_FILES["gambar"]["name"]);
// $uploadOk = 1;
// $imageFileType = strtolower(pathinfo($gambar,PATHINFO_EXTENSION));


/**
 * nomor pegawai
 * nama pegawai
 * tanggal lahir
 * alamat
 * foto
 */

if(isset($_POST['tambah'])){
  $nomor            = $_POST['nomor'];
  $nama             = $_POST['nama']  ;
  $tanggal_lahir    = $_POST['tanggal_lahir'] ;
  $alamat           = $_POST['alamat'] ;
  
  $dir = 'upload/';
  $gambar   =$_FILES['gambar']['name'];
  $temp_name = $_FILES['gambar']['tmp_name'];
  if(!empty(trim($nomor)) && !empty(trim($nama)) && !empty(trim($tanggal_lahir)) && !empty(trim($alamat)) ){
      if($gambar != ""){
        if(file_exists($dir.$gambar)){
          $gambar = time() . '_' . $gambar;
        }
          $fdir = $dir.$gambar;
          move_uploaded_file($temp_name,$fdir);
            if(tambahPegawai($nomor,$nama,$tanggal_lahir,$alamat,$gambar)){
              header('Location: index.php ');
            }else{
              echo '<script>alert("gagal")</script>';
            }
        }else{
          echo 'gagal menambahkan foto';
        }
  }else{
    die('ada yang kosong');
  }
}
?>
<div class="main-panel">
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Tambah Pegawai</h4>
                </div>
                <div class="card-body">
                  <form action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nomor</label>
                          <input type="text" required name="nomor" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nama</label>
                          <input type="text" required name="nama" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Alamat</label>
                          <input type="text" required name="alamat" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Tanggal lahir</label>
                          <input type="date" required name="tanggal_lahir" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="bmd-label-floating">Foto</label>
                            <input type="file" required name="gambar" class="form-control" style="opacity: unset; position: unset">
                          </div>
                        </div>
                    </div>
                    <button type="submit" name="tambah" class="btn btn-primary pull-right">Tambah</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
      
    </div>

<?php require_once("footer-admin.php") ?>