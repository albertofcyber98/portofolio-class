<?php
require 'connection.php';
function tambah_data_account($data)
{
  global $conn;
  $username = $data['username'];
  $password = $data['password'];
  $name = $data['nama'];
  $hash_password = password_hash($password, PASSWORD_DEFAULT);
  mysqli_query($conn, "INSERT INTO tbl_account 
  VALUES('$username','$hash_password','$name')");
  return mysqli_affected_rows($conn);
}
function hapus_data_account($username){
  global $conn;
  mysqli_query($conn, "DELETE FROM tbl_account WHERE username='$username'");
  return mysqli_affected_rows($conn);
}
function ubah_data_account($data){
  global $conn;
  $username = $data['username'];
  $nama = $data['nama'];
  $password = $data['password'];
  $hash_password = password_hash($password, PASSWORD_DEFAULT);
  if($password==''){
    mysqli_query($conn, "UPDATE tbl_account SET name='$nama' WHERE username='$username'");
  }else{
    mysqli_query($conn, "UPDATE tbl_account SET name='$nama', password='$hash_password' WHERE username='$username'");
  }
  return mysqli_affected_rows($conn);
}
