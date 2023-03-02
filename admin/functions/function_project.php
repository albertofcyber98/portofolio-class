<?php

require 'global.php';

function tambah_project($data){
  global $conn;
  $title = $data['title'];
  $description = $data['description'];
  $image = upload();
  mysqli_query($conn,"INSERT INTO tbl_project VALUES(NULL,'$title', '$image', '$description')");
  return mysqli_affected_rows($conn);
}
function delete_project($data)
{
  global $conn;
  $id = $data['id'];
  $image_lama = $data['image_lama'];
  unlink("img/$image_lama");
  mysqli_query($conn, "DELETE FROM tbl_project WHERE id=$id");
  return mysqli_affected_rows($conn);
}
function edit_project($data)
{
  global $conn;
  $id = $data['id'];
  $title = $data['title'];
  $description = $data['description'];
  $image_lama = $data['image_lama'];
  if ($_FILES['image']['error'] === 4) {
    $image = $image_lama;
  } else {
    $image = upload();
    unlink("img/$image_lama");
  }
  mysqli_query($conn, "UPDATE tbl_project SET
  title='$title',
  description='$description',
  image='$image'
  WHERE id=$id");
  return mysqli_affected_rows($conn);
}