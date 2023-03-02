<?php

require 'global.php';

function tambah_tech_select($data){
  global $conn;
  $title = $data['title'];
  mysqli_query($conn,"INSERT INTO tbl_tech_select VALUES(NULL,'$title')");
  return mysqli_affected_rows($conn);
}
function delete_tech_select($id)
{
  global $conn;
  $id = $id;
  mysqli_query($conn, "DELETE FROM tbl_tech_select WHERE id=$id");
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