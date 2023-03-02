<?php
require 'connection.php';
require 'global.php';
function ubah_data_profile($data){
  global $conn;
  $id = $data['id'];
  $nama = $data['nama'];
  $job_name = $data['job_name'];
  $address = $data['address'];
  $about = $data['about'];
  $no_telpon = $data['no_telpon'];
  $img_lama = $data['image_lama'];
  if($_FILES['image']['error']===4){
    $file = $img_lama;
  }else{
    $file = upload();
    unlink("img/$img_lama");
  }


  mysqli_query($conn, "UPDATE tbl_profil SET
  name='$nama',
  job_name='$job_name',
  address='$address',
  about='$about',
  no_telpon='$no_telpon',
  image='$file'
  WHERE id=$id");
  return mysqli_affected_rows($conn);
}