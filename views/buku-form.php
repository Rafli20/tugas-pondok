<?php require_once "./views/layouts/header.php"; ?>

  <?php if (!isset($buku)) : ?>

    <form class="transform" action="/perpus.php" method="post">
      <div class="artikel">
        <label for="judul">Judul</label>
        <input type="text" name="judul" value="">
        <br>
        <label for="isbn">Isbn</label>
        <input type="text" name="isbn" value="">
        <br>
        <label for="penerbit">Penerbit</label>
        <input type="text" name="penerbit" value="">
        <br>
        <label for="penulis">penulis</label>
        <input type="text" name="penulis" value="">
        <br>
        <label for="slug">Slug</label>
        <input type="text" name="slug" value="">
        <br>
        <input type="submit" name="submit" value="Tambah Buku">
      </div>
    </form>

  <?php else: ?>

    <form class="transform" action="/perpus.php" method="post">
      <div class="artikel">
        <label for="judul">Judul</label>
        <input type="text" name="judul" value="<?= $buku["judul"] ?>">
        <br>
        <label for="isbn">Isbn</label>
        <input type="text" name="isbn" value="<?= $buku["isbn"] ?>">
        <br>
        <label for="penerbit">Penerbit</label>
        <input type="text" name="penerbit" value="<?= $buku["penerbit"] ?>">
        <br>
        <label for="penulis">penulis</label>
        <input type="text" name="penulis" value="<?= $buku["penulis"] ?>">
        <br>
        <label for="slug">Slug</label>
        <input type="text" name="slug" value="<?= $buku["slug"] ?>">
        <input type="hidden" name="id" value="<?= $buku["id"] ?>">
        <br>
        <input type="submit" name="submit" value="Tambah Buku">
      </div>
    </form>

  <?php endif; ?>


<?php require_once "./views/layouts/footer.php"; ?>
