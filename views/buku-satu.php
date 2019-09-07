<?php require_once "./views/layouts/header.php"; ?>

  <div class="artikel">
    <h1 class="artikel-title">Detail Buku</h1>
    <ul>
      <li>Judul              : <?= $buku["judul"] ?></li>
      <li>ISBN               : <?= $buku["isbn"] ?></li>
      <li>Penerbit           : <?= $buku["penerbit"] ?></li>
      <li>Penulis            : <?= $buku["penulis"] ?></li>
    </ul>
    <h1 class="artikel-title">Detail Peminjaman</h1>
    <ul>
      <li>Nama Peminjam      : <?= $buku["nama_peminjam"] ?></li>
      <li>Tanggal Pinjam     : <?= $buku["tanggal_pinjam"] ?></li>
      <li>Tanggal Kembalikan : <?= $buku["tanggal_kembalikan"] ?></li>
    </ul>
  </div>

<?php require_once "./views/layouts/footer.php"; ?>
