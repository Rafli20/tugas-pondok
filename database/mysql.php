<?php

$conn = mysqli_connect("localhost", "root", "Password 123", "perpus");

if (mysqli_connect_errno()) {
  $error = mysqli_erro($conn);
  echo "Koneksi gagal karena, $error";
}
 ?>
