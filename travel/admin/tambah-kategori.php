<?php
    session_start();
    include 'db.php';
    if($_SESSION['status_login'] != true){
        echo '<script>window.location="login.php"</script>';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Categories</title>

    <link rel="stylesheet" type="text/css" href="../css/style_admin.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Header -->
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
            <h1>Tambah Data Kategori</h1>
            <div class="box">
                <form action="" method="POST" enctype="multipart/form-data">
                    <input type="text" name="nama" class="input-control" placeholder="Nama Kategori" required>
                    <textarea name="deskripsi" placeholder="Deskripsi Kategori" class="input-control"></textarea><br>
                    <input type="file" name="gambar" class="input-control" required>
                    <input type="submit" name="submit" value="Tambah" class="btn">
                </form>

                <?php
                if (isset($_POST['submit'])) {
                    $nama = $_POST['nama'];
                    $deskripsi = $_POST['deskripsi'];

                    $filename = $_FILES['gambar']['name'];
                    $tmp_name = $_FILES['gambar']['tmp_name'];

                    $type1 = explode('.', $filename);
                    $type2 = strtolower(end($type1));

                    $newname = 'category'.time().'.'.$type2;

                    $tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');

                    if (!in_array($type2, $tipe_diizinkan)) {
                        echo '<script>alert("Format file tidak diizinkan")</script>';
                    } else {
                        move_uploaded_file($tmp_name, './category/'.$newname);

                        $insert = mysqli_query($conn, "INSERT INTO tb_categories VALUES (
                            null,
                            '".$newname."',
                            '".$nama."',
                            '".$deskripsi."'
                        )");

                        if ($insert) {
                            echo '<script>alert("Tambah data berhasil")</script>';
                            echo '<script>window.location="data-kategori.php"</script>';
                        } else {
                            echo 'gagal: '.mysqli_error($conn);
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
</body>
</html>
