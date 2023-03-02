<?php

require 'global.php';

function tambah_experince($data){
  global $conn;
  $title = $data['title'];
  $company = $data['company'];
  $start_date = $data['start_date'];
  $end_date = $data['end_date'];
  mysqli_query($conn,"INSERT INTO tbl_experince VALUES(NULL,'$title', '$company', '$start_date', '$end_date')");
  return mysqli_affected_rows($conn);
}
function delete_experince($id)
{
  global $conn;
  $id = $id;
  mysqli_query($conn, "DELETE FROM tbl_experince WHERE id=$id");
  return mysqli_affected_rows($conn);
}
function edit_experince($data)
{
  global $conn;
  $id = $data['id'];
  $title = $data['title'];
  $company = $data['company'];
  $start_date = $data['start_date'];
  $end_date = $data['end_date'];
  mysqli_query($conn, "UPDATE tbl_experince SET
  job_title='$title',
  company='$company',
  start_date='$start_date',
  end_date='$end_date'
  WHERE id=$id");
  return mysqli_affected_rows($conn);
}