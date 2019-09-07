<?php

function getBuku($conn, $id) {
    //  Ambil semua data yg ada di database
  if ($result = mysqli_query($conn, "SELECT * FROM buku WHERE id='$id'")) {
    return mysqli_fetch_assoc($result);
  } else {
    echo false;
  }
}

function getBukuBySlug($conn, $slug) {
  if ($result = mysqli_query($conn, "SELECT * FROM buku WHERE slug='$slug'")) {
    return mysqli_fetch_assoc($result);
  }
}
function getAllBuku($conn) {
    // Tampilkan database satu persatu
    if ($result = mysqli_query($conn, "SELECT * FROM buku")) {

      $buku = array();
      while ($row = mysqli_fetch_assoc($result)) {
        $buku [] = $row;
      }
      mysqli_free_result($result);
      return $buku;
    }
}

function addBuku($conn, $judul, $isbn, $penerbit, $penulis, $slug) {
  $stmt = mysqli_prepare(
          $conn,
          "INSERT INTO buku (judul, isbn, penerbit, penulis, slug) VALUES (?,?,?,?,?)"
          );

  if ($stmt) {
    mysqli_stmt_bind_param($stmt, 'sssss', $judul, $isbn, $penerbit, $penulis, $slug);
    //  Ternary untuk mengecek apakah error atau tidak
    //  Ternary itu if yg pendek
    return mysqli_stmt_execute($stmt)?: mysqli_stmt_error($stmt);
  }
}

function updateBuku($conn, $id, $judul, $isbn, $penerbit, $penulis, $slug) {
  $stmt = mysqli_prepare(
          $conn,
          "UPDATE buku SET judul=?, isbn=?, penerbit=?, penulis=?, slug=? WHERE id=?"
          );

    if ($stmt) {
      mysqli_stmt_bind_param($stmt, 'sssssi', $judul, $isbn, $penerbit, $penulis, $slug, $id);

      return mysqli_stmt_execute($stmt)?: mysqli_stmt_error($stmt);
    }
}

function deleteBuku($conn, $id) {
  $stmt = mysqli_prepare($conn, "DELETE FROM buku WHERE id=?");

    if ($stmt) {
      mysqli_stmt_bind_param($stmt, 'i', $id);

      return mysqli_stmt_execute($stmt)?: mysqli_stmt_error($stmt);
    }
}

function pinjamBuku($conn, $id, $nama_peminjam, $tanggal_pinjam, $tanggal_kembalikan) {
  $stmt = mysqli_prepare($conn, "UPDATE buku SET nama_peminjam=?, tanggal_pinjam=?, tanggal_kembalikan=? WHERE id=?");

    if ($stmt) {
      mysqli_stmt_bind_param($stmt, 'sssi', $nama_peminjam, $tanggal_pinjam, $tanggal_kembalikan, $id);

      return mysqli_stmt_execute($stmt)?: mysqli_stmt_error($stmt);
    }
}

function kembalikanBuku($conn, $id, $nama_peminjam, $tanggal_pinjam, $tanggal_kembalikan) {
  $stmt = mysqli_prepare($conn, "UPDATE buku SET nama_peminjam=?, tanggal_pinjam=?, tanggal_kembalikan=? WHERE id=?");

    if ($stmt) {
      mysqli_stmt_bind_param($stmt, 'sssi', $nama_peminjam, $tanggal_pinjam, $tanggal_kembalikan, $id);

      return mysqli_stmt_execute($stmt)?: mysqli_stmt_error($stmt);
    }
}
 ?>
