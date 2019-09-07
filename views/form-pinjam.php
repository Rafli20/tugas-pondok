<?php require_once "./views/layouts/header.php"; ?>

  <form class="transform" action="/perpus.php" method="post">
    <div class="artikel">
      <label for="nama_peminjam">Nama Peminjam</label>
      <input type="text" name="nama_peminjam" value="<?= $buku["nama_peminjam"] ?>">
      <br>
      <label for="tanggal_pinjam">Tanggal Pinjam</label>
      <input type="text" name="tanggal_pinjam" value="<?= $buku["tanggal_pinjam"] ?>">
      <br>
      <label for="tanggal_kembalikan">Tanggal Kembalikan</label>
      <input type="text" name="tanggal_kembalikan" value="<?= $buku["tanggal_kembalikan"] ?>">
      <br>
      <input type="hidden" name="id" value="<?= $buku["id"] ?>">
      <input type="submit" name="pinjam" value="Pinjam Buku">
    </div>
  </form>

<?php require_once "./views/layouts/footer.php"; ?>
