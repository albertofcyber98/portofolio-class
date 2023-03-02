<?php

require 'global.php';

function tambah_skill($data){
  global $conn;
  $title = $data['title'];
  $progress = $data['progress'];
  $image = upload();
  mysqli_query($conn,"INSERT INTO tbl_skill VALUES(NULL,'$title','$progress','$image')");
  return mysqli_affected_rows($conn);
}
function delete_skill($data)
{
  global $conn;
  $id = $data['id'];
  $image_lama = $data['image_lama'];
  unlink("img/$image_lama");
  mysqli_query($conn, "DELETE FROM tbl_skill WHERE id=$id");
  return mysqli_affected_rows($conn);
}
function edit_skill($data)
{
  global $conn;
  $id = $data['id'];
  $title = $data['title'];
  $progress = $data['progress'];

  $image_lama = $data['image_lama'];
  if ($_FILES['image']['error'] === 4) {
    $image = $image_lama;
  } else {
    $image = upload();
    unlink("img/$image_lama");
  }
  mysqli_query($conn, "UPDATE tbl_skill SET
  title='$title',
  progress='$progress',
  image='$image'
  WHERE id=$id");
  return mysqli_affected_rows($conn);
}