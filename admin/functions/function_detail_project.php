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
function edit_tech_select($data)
{
  global $conn;
  $id = $data['id'];
  $title = $data['title'];
  mysqli_query($conn, "UPDATE tbl_tech_select SET
  title='$title'
  WHERE id=$id");
  return mysqli_affected_rows($conn);
}