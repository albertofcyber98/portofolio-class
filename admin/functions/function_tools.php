<?php

require 'global.php';

function tambah_tools_select($data){
  global $conn;
  $title = $data['title'];
  mysqli_query($conn,"INSERT INTO tbl_tools_select VALUES(NULL,'$title')");
  return mysqli_affected_rows($conn);
}
function delete_tools_select($id)
{
  global $conn;
  $id = $id;
  mysqli_query($conn, "DELETE FROM tbl_tools_select WHERE id=$id");
  return mysqli_affected_rows($conn);
}
function edit_tools_select($data)
{
  global $conn;
  $id = $data['id'];
  $title = $data['title'];
  mysqli_query($conn, "UPDATE tbl_tools_select SET
  title='$title'
  WHERE id=$id");
  return mysqli_affected_rows($conn);
}