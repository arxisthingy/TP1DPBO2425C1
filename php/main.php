<?php
require('Elektronik.php');
session_start();

if (isset($_GET['reset'])) {
    session_destroy();       // clear all session data
    header("Location: main.php"); // reload page
    exit;
}

// Initialize sample data if not present
if (!isset($_SESSION['elektronik_list'])) {
    $_SESSION['elektronik_list'] = [
        new Elektronik(1, "Laptop", "Toshiba", "Laptop Toshiba Core i5", 7000000, "images/laptop.jpg"),
        new Elektronik(2, "Smartphone", "Samsung", "Samsung Galaxy S21", 12000000, "images/s21.jpg"),
        new Elektronik(3, "TV", "LG", "Smart TV 42 inch", 5000000, "images/tv.jpg"),
    ];
}

$elektronik_list = $_SESSION['elektronik_list'];

// CREATE
if (isset($_POST['action']) && $_POST['action'] === 'add') {
    $id = count($elektronik_list) + 1;
    $foto = "";
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
        if (!is_dir("images")) mkdir("images", 0777, true);
        $foto = "images/" . uniqid("img_") . "_" . basename($_FILES['foto']['name']);
        move_uploaded_file($_FILES['foto']['tmp_name'], $foto);
    }
    $new_elektronik = new Elektronik($id, $_POST['nama'], $_POST['merek'], $_POST['deskripsi'], $_POST['harga'], $foto);
    $elektronik_list[] = $new_elektronik;
    $_SESSION['elektronik_list'] = $elektronik_list;
}

// UPDATE
if (isset($_POST['action']) && $_POST['action'] === 'edit') {
    foreach ($elektronik_list as $item) {
        if ($item->getId() == $_POST['id']) {
            $item->setNama($_POST['nama']);
            $item->setMerek($_POST['merek']);
            $item->setDeskripsi($_POST['deskripsi']);
            $item->setHarga($_POST['harga']);
            if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
                $foto = "images/" . uniqid("img_") . "_" . basename($_FILES['foto']['name']);
                move_uploaded_file($_FILES['foto']['tmp_name'], $foto);
                $item->setFoto($foto);
            }
            break;
        }
    }
    $_SESSION['elektronik_list'] = $elektronik_list;
    header("Location: main.php"); // redirect to avoid form resubmission
    exit;
}

// DELETE
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $elektronik_list = array_filter($elektronik_list, fn($item) => $item->getId() != $id);
    $_SESSION['elektronik_list'] = $elektronik_list;
    header("Location: main.php");
    exit;
}

// For editing, find the item
$editItem = null;
if (isset($_GET['edit'])) {
    foreach ($elektronik_list as $item) {
        if ($item->getId() == $_GET['edit']) {
            $editItem = $item;
            break;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CRUD Elektronik</title>
    <style>
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        th, td { border: 1px solid #666; padding: 8px; text-align: center; }
        th { background: #eee; }
        img { max-width: 100px; }
    </style>
</head>
<body>
    <a href="?reset=1" onclick="return confirm('Reset all data?')">Reset Data</a>
    <h2>CRUD Data Elektronik</h2>

    <!-- CREATE -->
    <h3>Tambah Produk Baru</h3>
    <form method="post" enctype="multipart/form-data">
        <input type="hidden" name="action" value="add">
        Nama: <input type="text" name="nama" required>
        Merek: <input type="text" name="merek" required>
        Deskripsi: <input type="text" name="deskripsi" required>
        Harga: <input type="number" name="harga" required>
        Foto: <input type="file" name="foto" accept="image/*">
        <button type="submit">Tambah</button>
    </form>

    <!-- READ -->
    <h3>Daftar Produk</h3>
    <table>
        <tr>
            <th>ID</th><th>Nama</th><th>Merek</th><th>Deskripsi</th><th>Harga</th><th>Foto</th><th>Aksi</th>
        </tr>
        <?php foreach ($elektronik_list as $item): ?>
        <tr>
            <td><?= $item->getId() ?></td>
            <td><?= $item->getNama() ?></td>
            <td><?= $item->getMerek() ?></td>
            <td><?= $item->getDeskripsi() ?></td>
            <td>Rp<?= number_format($item->getHarga(), 0, ',', '.') ?></td>
            <td>
                <?php if ($item->getFoto()): ?>
                    <img src="<?= $item->getFoto() ?>" alt="<?= $item->getNama() ?>">
                <?php else: ?>
                    No Photo
                <?php endif; ?>
            </td>
            <td>
                <a href="?edit=<?= $item->getId() ?>">Edit</a> | 
                <a href="?delete=<?= $item->getId() ?>" onclick="return confirm('Yakin hapus produk ini?')">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <!-- UPDATE FORM -->
    <?php if ($editItem): ?>
    <h3>Edit Produk: <?= $editItem->getNama() ?></h3>
    <form method="post" enctype="multipart/form-data">
        <input type="hidden" name="action" value="edit">
        <input type="hidden" name="id" value="<?= $editItem->getId() ?>">
        Nama: <input type="text" name="nama" value="<?= $editItem->getNama() ?>" required>
        Merek: <input type="text" name="merek" value="<?= $editItem->getMerek() ?>" required>
        Deskripsi: <input type="text" name="deskripsi" value="<?= $editItem->getDeskripsi() ?>" required>
        Harga: <input type="number" name="harga" value="<?= $editItem->getHarga() ?>" required>
        Foto: <input type="file" name="foto" accept="image/*">
        <?php if ($editItem->getFoto()): ?>
            <br>Current: <img src="<?= $editItem->getFoto() ?>" alt="<?= $editItem->getNama() ?>" style="max-width:80px;">
        <?php endif; ?>
        <br>
        <button type="submit">Simpan Perubahan</button>
    </form>
    <?php endif; ?>
</body>
</html>
