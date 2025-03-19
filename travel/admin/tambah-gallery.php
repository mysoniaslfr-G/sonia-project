<?php
session_start();
include 'db.php';
if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin | Travel</title>

    <link rel="stylesheet" type="text/css" href="../css/style_admin.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">

    <script src="https://cdn.ckeditor.com/4.25.0-lts/standard/ckeditor.js"></script>
</head>
<body>
    <!-- header -->
    <header>
        <div class="container">
            <h1><a href="dashboard.php">Admintravel</a></h1>
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="profil.php">Profil</a></li>
                <li><a href="data-kategori.php">Data Categories</a></li>
                <li><a href="data-gallery.php">Data Gallery</a></li>
                <li><a href="coment-admin.php">Data Comment</a></li>
                <li><a href="keluar.php">Logout</a></li>
            </ul>
        </div>
    </header>

    <!-- Content -->
    <div class="section">
        <div class="container">
            <h1>Tambah Data Gallery</h1>
            <div class="box">
                <form action="" method="POST" enctype="multipart/form-data">
                    <select name="kategori" class="input-control" required>
                        <option value="">--Pilih--</option>
                        <?php
                        $kategori = mysqli_query($conn, "SELECT * FROM tb_categories ORDER BY categories_id DESC");
                        while ($r = mysqli_fetch_array($kategori)) {
                        ?>
                            <option value="<?php echo htmlspecialchars($r['categories_id']) ?>"><?php echo htmlspecialchars($r['categories_name']) ?></option>
                        <?php } ?>
                    </select>

                    <input type="text" name="nama" class="input-control" placeholder="Nama Gallery" required>
                    <input type="file" name="gambar" class="input-control" required>

                    <textarea name="deskripsi" placeholder="Deskripsi Gallery" class="input-control"></textarea>

                    <input type="text" name="map_embed" class="input-control" placeholder="Embed Code Peta (optional)">
                    <textarea name="map_desc" placeholder="Deskripsi map" class="input-control"></textarea>

                    <select name="status" class="input-control" required>
                        <option value="">--Pilih--</option>
                        <option value="1">Aktif</option>
                        <option value="0">Tidak Aktif</option>
                    </select>

                    <input type="submit" name="submit" value="submit" class="btn">
                </form>

                <?php
                if (isset($_POST['submit'])) {
                    $kategori = htmlspecialchars($_POST['kategori']);
                    $nama = htmlspecialchars($_POST['nama']);
                    $deskripsi = htmlspecialchars($_POST['deskripsi']);
                    $status = htmlspecialchars($_POST['status']);
                    $map_embed = htmlspecialchars($_POST['map_embed']);
                    $map_desc = htmlspecialchars($_POST['map_desc']);

                    // Upload gambar
                    $filename = $_FILES['gambar']['name'];
                    $tmp_name = $_FILES['gambar']['tmp_name'];

                    $type1 = explode('.', $filename);
                    $type2 = strtolower(end($type1));

                    $newname = 'gallery' . time() . '.' . $type2;

                    $tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');

                    if (!in_array($type2, $tipe_diizinkan)) {
                        echo '<script>alert("Format file gambar tidak diizinkan")</script>';
                    } else {
                        if (move_uploaded_file($tmp_name, 'gallery/' . $newname)) {
                            // Insert data ke tabel gallery
                            $insert = mysqli_query($conn, "INSERT INTO gallery (categories_id, gallery_name, gallery_image, gallery_desc, map_embed, description, status_gallery) 
                                VALUES (
                                    '$kategori', 
                                    '$nama', 
                                    '$newname', 
                                    '$deskripsi', 
                                    '$map_embed', 
                                    '$map_desc', 
                                    '$status'
                                )");

                            if ($insert) {
                                echo '<script>alert("Tambah data berhasil")</script>';
                                echo '<script>window.location="data-gallery.php"</script>';
                            } else {
                                echo '<script>alert("Gagal menambah data")</script>';
                                echo 'Error: ' . mysqli_error($conn);
                            }
                        } else {
                            echo '<script>alert("Gagal mengunggah gambar")</script>';
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="container">
            <small>Copyright &copy; 2024 - Admintravel</small>
        </div>
    </footer>

    <script>
        CKEDITOR.replace('deskripsi');
    </script>
</body>
</html>
