<?php
require_once('db.php');

/**
 * nomor pegawai
 * nama pegawai
 * tanggal lahir
 * alamat
 * foto
 */

/**
 * username
 * password
 */
function tambahPegawai($nomor,$nama,$tanggal,$alamat, $gambar)
{
    global $conn;

    $query = "INSERT INTO pegawai (nomor,nama,tanggal_lahir,alamat, gambar) VALUES ('$nomor','$nama','$tanggal','$alamat', '$gambar')";
    
    if($result = mysqli_query($conn, $query)){
        return true;
    }else{
        return false;
    }
}

function getPegawai()
{
    global $conn;

    $query = "SELECT * FROM pegawai";
    $result = mysqli_query($conn, $query);

    return $result;
}

function getPegawaiId($id)
{
    global $conn;

    $query  = "SELECT * FROM pegawai WHERE id='$id'";
    $result = mysqli_query($conn, $query);
    
    if(mysqli_num_rows($result) > 0){
        return $result;    
    }else{
        die('gagal');
    }
    
}
function setPegawai($id, $nomor, $nama, $tanggal, $alamat, $gambar = "")
{
    global $conn;
    
    if($gambar === ""){
        $query = "UPDATE pegawai SET nomor='$nomor', nama='$nama', tanggal_lahir='$tanggal', alamat='$alamat' WHERE id=$id";
    }else if($gambar !== ""){
        $query = "UPDATE pegawai SET nomor='$nomor', nama='$nama', tanggal_lahir='$tanggal', alamat='$alamat', gambar='$gambar' WHERE id=$id";
    }

    if(mysqli_query($conn, $query)){
        return true;
    }else{
        return false;
    }
}

function deletePegawai($id)
{
    global $conn;

    $query = "DELETE FROM pegawai WHERE id='$id'";

    if(mysqli_query($conn, $query)){
        return true;
    }else{
        die('gagal menghapus');
    }
}


?>