<?php
    session_start();
    include 'db.php';
    if($_SESSION['status_login'] != true){
        echo '<script>window.location="login.php"</script>';
    }

    $kategori = mysqli_query($conn, "SELECT * FROM tb_categories WHERE categories_id = '".$_GET['id']."' ");
    if(mysqli_num_rows($kategori) == 0){
        echo '<script>window.location="data-kategori.php"</script>';
    }
    $k = mysqli_fetch_object($kategori);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Travel</title>

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
            <h1>Edit Data Kategori</h1>
            <div class="box">
                <form action="" method="POST" enctype="multipart/form-data">
                    <input type="text" name="nama" class="input-control" placeholder="Nama Kategori" 
                    value="<?php echo $k->categories_name ?>"  required>

                    <img src="category/<?php echo $k->categories_image ?>" width="100px">

                    <input type="hidden" name="foto" value="<?php echo $k->categories_image?>">

                    <input type="file" name="gambar" class="input-control">
                    <textarea name="deskripsi" placeholder="Deskripsi" class="input-control"><?php echo $k->categories_desc ?></textarea><br>
                    <input type="submit" name="submit" value="submit" class="btn">
                </form>

                <?php
                if (isset($_POST['submit'])) {

                    //data inputan dari form
                    $nama       = $_POST['nama'];
                    $deskripsi  = $_POST['deskripsi'];
                    $foto       = $_POST['foto'];

                    //data gambar yang baru

                    $filename   = $_FILES['gambar']['name'];
                    $tmp_name   = $_FILES['gambar']['tmp_name'];

                    $type1      = explode('.', $filename);
                    $type2      = strtolower(end($type1));

                    $newname    = 'category'.time().'.'.$type2;

                    $tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');

                    //jika admin ganti gambar 
                    if ($filename != '') {
                        if (!in_array($type2, $tipe_diizinkan)) {
                            echo '<script>alert("Format file tidak diizinkan")</script>';
                        } else {
                            // Periksa apakah file lama ada sebelum menghapus
                            if (file_exists('category/'.$foto)) {
                                unlink('category/'.$foto);
                            }
                            move_uploaded_file($tmp_name, 'category/'.$newname);
                            $namagambar = $newname;
                        }
                    } else {
                        // Jika admin tidak ganti gambar
                        $namagambar = $foto;
                    }
                    

                    //query update data kategori
                    $update = mysqli_query($conn, "UPDATE tb_categories SET 
                                categories_name = '".$nama."', 
                                categories_desc = '".$deskripsi."', 
                                categories_image = '".$namagambar."'
                                WHERE categories_id = '".$k->categories_id."'");


                    if ($update) {
                        echo '<script>alert("Ubah data berhasil")</script>';
                        echo '<script>window.location="data-kategori.php"</script>';
                    } else {
                        echo 'gagal: '.mysqli_error($conn);
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
