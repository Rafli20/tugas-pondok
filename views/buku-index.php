<?php require_once "./views/layouts/header.php"; ?>

<div class="artikel">
  <h1 class="artikel-title">Daftar Buku</h1>
  <table border="2" cellpading="10" cellspacing="0">
    <thead>
      <tr>
        <th>Judul</th>
        <th>Penulis</th>
        <th>Peminjam</th>
        <th>Aksi</th>
        <th>Peminjaman</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($data_database as $row): ?>
        <tr>
          <td><a href="/perpus.php/?judul=<?= $row["slug"] ?>"><?= $row["judul"] ?></a></td>
          <td><?= $row["penulis"] ?></td>
          <td>
            <?= $row["nama_peminjam"] ?>
            <?= $row["tanggal_pinjam"] ?>,
            <?= $row["tanggal_kembalikan"] ?>
          </td>
          <td>
            <button>
              <a href="/perpus.php/?edit=true&id=<?= $row["id"] ?>">Update</a>
            </button>
            <form class="" action="/perpus.php" method="post">
              <input type="hidden" name="id" value="<?= $row["id"]; ?>">
              <input type="submit" name="delete" value="Delete">
            </form>
          </td>
          <td>
            <button>
              <a href="/perpus.php/?pinjam=true&id=<?= $row["id"] ?>">Pinjam</a>
            </button>
            <form class="" action="/perpus.php" method="post">
              <input type="hidden" name="id" value="<?= $row["id"]; ?>">
              <input type="submit" name="kembalikan" value="Kembalikan">
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<?php require_once "./views/layouts/footer.php"; ?>
