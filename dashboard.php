<?php
require_once "./database/mysql.php";
require_once "./controllers/controller-buku.php";

} if (isset($_POST["update"])) {
  if (updateBuku(
      $conn,
      $_POST["id"],  $_POST["judul"], $_POST["isbn"], $_POST["penerbit"], $_POST["penulis"], $_POST["slug"],) === true
      ) {
      echo "Berhasil. <a herf='http://localhost:8000/perpus.php'>Kembali</a>";
      header("location: http://localhost:8000/perpus.php");
  } else {
    echo "Gagal";
  }
} else if (isset($_POST["delete"])) {
  if (($pesan = deleteArtikel($conn, $_POST["id"])) === true) {
    echo "Berhasil. <a herf='http://localhost:8000/perpus.php'>Kembali</a>";
    header("location: http://localhost:8000/perpus.php");
  } else {
    echo $pesan;
  }
} else if (isset($_GET["edit"]) && isset($_GET["id"])) {
  $buku = (getBuku($conn, $_GET["id"]));

  require "./views/buku-form.php";
} else if (isset($_GET["dashboard"]) && isset($_GET["dashboard"]) === true) {
  $semua_data = getAllBuku($conn);

  require "./views/buku-index.php";
} else {
  //  Jika tidak ada tampilkan semua buku
  $data_database = getAllBuku($conn);
  require "./views/buku-index.php";
}
?>
