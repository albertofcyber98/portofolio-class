<?php

require 'global.php';

function tambah_tech($data){
  global $conn;
  $id_project = $data['id_project'];
  $id_tech = $data['id_tech'];
  mysqli_query($conn,"INSERT INTO tbl_tech VALUES(NULL,'$id_project','$id_tech')");
  return mysqli_affected_rows($conn);
}
function delete_tech($data)
{
  global $conn;
  $id = $data['id'];
  mysqli_query($conn, "DELETE FROM tbl_tech WHERE id=$id");
  return mysqli_affected_rows($conn);
}
function edit_tech($data)
{
  global $conn;
  $id = $data['id'];
  $id_tech = $data['id_tech'];
  mysqli_query($conn, "UPDATE tbl_tech SET
  id_tech_select='$id_tech'
  WHERE id=$id");
  return mysqli_affected_rows($conn);
}