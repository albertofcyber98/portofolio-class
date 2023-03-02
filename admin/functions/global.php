<?php
require 'connection.php';
function query_data($data)
{
  global $conn;
  $result = mysqli_query($conn, $data);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}
function upload()
{
  $namaFile = $_FILES['image']['name'];
  $ukuranFile = $_FILES['image']['size'];
  $error = $_FILES['image']['error'];
  $tmpName = $_FILES['image']['tmp_name'];
  // cek jika tidak ada gambar diupload

  if ($error === 4) {
    echo "
            <script>
                alert('Masukkan image');
            </script>
            ";
    return false;
  }
  if ($ukuranFile > 5000000) {
    echo "
            <script>
                alert('Tidak lebih dari 3mb');
            </script>
            ";
    return false;
  }
  // cek yang boleh diupload
  $ekstensiFileValid = ['jpg', 'png', 'jpeg', 'svg'];
  $ekstensiFile = explode('.', $namaFile);
  $ekstensiFile = strtolower(end($ekstensiFile));
  if (!in_array($ekstensiFile, $ekstensiFileValid)) {
    echo "
            <script>
                alert('Upload file berekstensi jpg, png, jpeg atau svg');
            </script>
            ";
    return false;
  }
  // lolos pengecekan
  //generate
  $namaFileBaru = uniqid();
  // 8sdfi989898
  $namaFileBaru .= '.';
  // 8sdfi989898.
  $namaFileBaru .= $ekstensiFile;
  // 8sdfi989898.docx
  move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
  return $namaFileBaru;
}
