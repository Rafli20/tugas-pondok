<?php
require_once "./database/mysql.php";
require_once "./controllers/controller-buku.php";

if (isset($_GET["judul"])) {
  //  Cek data
  $buku = getBukuBySlug($conn, $_GET["judul"]);
  //  Jika ada maka tampilkan
  require "./views/buku-satu.php";
} else if (isset($_POST["submit"])) {
  $pesan = addBuku($conn, $_POST["judul"], $_POST["isbn"], $_POST["penerbit"], $_POST["penulis"], $_POST["slug"]);
    if ($pesan === true) {
    echo "Berhasil";
    header("location: http://localhost:8000/perpus.php");
  } else {
    echo "Gagal";
  }
} else if (isset($_GET["new"])) {
  require "./views/buku-form.php";
} else if (isset($_POST["update"])) {
  if (updateBuku(
      $conn,
      $_POST["id"],  $_POST["judul"], $_POST["isbn"], $_POST["penerbit"], $_POST["penulis"], $_POST["slug"]) === true
      ) {
      echo "Berhasil. <a herf='http://localhost:8000/perpus.php/?dashboard=true'>Kembali</a>";
      header("location: http://localhost:8000/perpus.php/?dashboard=true");
  } else {
    echo "Gagal";
  }
} else if (isset($_POST["delete"]) && isset($_POST["id"])) {
  if (($pesan = deleteBuku($conn, $_POST["id"])) === true) {
    echo "Berhasil. <a herf='http://localhost:8000/perpus.php/?dashboard=true'>Kembali</a>";
    header("location: http://localhost:8000/perpus.php/?dashboard=true");
  } else {
    echo $pesan;
  }
} else if (isset($_GET["edit"]) && isset($_GET["id"])) {
  $buku = (getBuku($conn, $_GET["id"]));

  require "./views/buku-form.php";
} else if (isset($_GET["dashboard"]) && isset($_GET["dashboard"]) === true) {
  $data_database = getAllBuku($conn);

  require "./views/buku-index.php";
} else if (isset($_POST["pinjam"])) {
  if (($pesan = pinjamBuku(
     $conn,
     $_POST["id"], $_POST["nama_peminjam"], $_POST["tanggal_pinjam"], $_POST["tanggal_kembalikan"])) ===true
     ) {
    echo "Berhasil.<a href='http://localhost:8000/perpus.php/?dashboard=true'>Kembali</a>";
    header("location: http://localhost:8000/perpus.php/?dashboard=true");
  } else {
    echo "Gagal";
  }
} else if (isset($_GET["pinjam"]) && isset($_GET["id"])) {
  $buku = getBuku($conn, $_GET["id"]);

  require "./views/form-pinjam.php";
} else if (isset($_POST["kembalikan"])) {
  $pesan = kembalikanBuku(
     $conn,
     $_POST["id"], $_POST["nama_peminjam"], $_POST["tanggal_pinjam"], $_POST["tanggal_kembalikan"]);
  if ($pesan === true) {
    echo "Berhasil.<a href='http://localhost:8000/perpus.php/?dashboard=true'>Kembali</a>";
    header("location: http://localhost:8000/perpus.php/?dashboard=true");
  } else {
    echo $pesan;
  }
} else {
  //  Jika tidak ada tampilkan semua buku
  $data_database = getAllBuku($conn);
  require "./views/buku-index.php";
}
?>
