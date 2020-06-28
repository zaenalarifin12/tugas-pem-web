
<?php 
require_once("head-admin.php") ?>
<?php 
require_once('init/index.php');
require_once('init/init.php');
// ngambil data per id
$id = $_GET['id'];
$result = getPegawaiId($id);
$row = mysqli_fetch_assoc($result);
$jumlah = $result->num_rows;

  
if(isset($_POST['submit'])){
    $nomor            = $_POST['nomor'];
    $nama             = $_POST['nama'];
    $tanggal_lahir    = $_POST['tanggal_lahir'] ;
    $alamat           = $_POST['alamat'] ;
  
  $dir      = 'upload/';
  $gambar   = $_FILES['gambar']['name'];
  $tmp_name = $_FILES['gambar']['tmp_name'];
  if(!empty(trim($nomor)) && !empty(trim($nama)) && !empty(trim($tanggal_lahir)) && !empty(trim($alamat))){
    if($gambar != ""){
      while($file = mysqli_fetch_assoc($result)){
        $aa = $file['gambar'];
      }
      unlink('upload/'.$aa);
      if(file_exists($dir.$gambar)){
        $gambar = time() . '_' . $gambar;
      }
        $fdir = $dir.$gambar;
        move_uploaded_file($tmp_name, $fdir);
        if(setPegawai($id, $nomor, $nama, $tanggal_lahir, $alamat,$gambar)){
          header('Location: index.php');
        }else{
          die('gagal mengedit data');
        }
    }else{
      if(setPegawai($id, $nomor, $nama, $tanggal_lahir, $alamat)){
        header('Location: index.php');
      }else{
        die('gagal mengedit data');
      }
    }
  }else{
    die('ada data yang kosong');
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
                  <h4 class="card-title">Edit Pegawai</h4>
                </div>
                <div class="card-body">
                  <form action="" method="post" enctype="multipart/form-data">
                  <?php for($i = 0; $i < $jumlah; $i++){ ?>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nomor</label>
                          <input type="text" required name="nomor" class="form-control" value="<?= $row['nomor']?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nama</label>
                          <input type="text" required name="nama" class="form-control" value="<?= $row['nama']?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Alamat</label>
                          <input type="text" required name="alamat" class="form-control" value="<?= $row['alamat']?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Tanggal lahir</label>
                          <input type="date" required name="tanggal_lahir" class="form-control" value="<?= $row['tanggal_lahir']?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="bmd-label-floating">Foto</label>
                            <img src="upload/<?=$row['gambar']?>" alt="" width="100px" height="100px">
                            <p>Ganti (Opsional)</p>
                            <input type="file"  name="gambar" class="form-control" style="opacity: unset; position: unset">
                          </div>
                        </div>
                    </div>
                  <?php } ?>
                    <button type="submit" name="submit" class="btn btn-primary pull-right">Edit</button>
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