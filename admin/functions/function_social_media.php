<?php

require 'global.php';

function tambah_social_media($data){
  global $conn;
  $title = $data['title'];
  $link = $data['link'];
  $image = upload();
  mysqli_query($conn,"INSERT INTO tbl_sosial_media VALUES(NULL,'$title','$link','$image')");
  return mysqli_affected_rows($conn);
}
function delete_social_media($data)
{
  global $conn;
  $id = $data['id'];
  $image_lama = $data['image_lama'];
  unlink("img/$image_lama");
  mysqli_query($conn, "DELETE FROM tbl_sosial_media WHERE id=$id");
  return mysqli_affected_rows($conn);
}
function edit_social_media($data)
{
  global $conn;
  $id = $data['id'];
  $title = $data['title'];
  $link = $data['link'];

  $image_lama = $data['image_lama'];
  if ($_FILES['image']['error'] === 4) {
    $image = $image_lama;
  } else {
    $image = upload();
    unlink("img/$image_lama");
  }
  mysqli_query($conn, "UPDATE tbl_sosial_media SET
  title='$title',
  link='$link',
  image='$image'
  WHERE id=$id");
  return mysqli_affected_rows($conn);
}