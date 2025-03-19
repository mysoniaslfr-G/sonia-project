<?php
    session_start();
    include 'db.php';
    if($_SESSION['status_login'] != true){
        echo '<script>window.location="login.php"</script>';
    }

    $gallery = mysqli_query($conn, "SELECT * FROM gallery WHERE gallery_id = '".$_GET['id']."' ");
    if(mysqli_num_rows($gallery) == 0){
        echo '<script>window.location="data-gallery.php"</script>';
    }
    $g = mysqli_fetch_object($gallery);
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
            <h1>Edit Data Gallery</h1>
            <div class="box">
                <form action="" method="POST" enctype="multipart/form-data">
                    <select name="kategori" class="input-control" required>
                        <option value="">--Pilih--</option>
                        <?php
                            $kategori = mysqli_query($conn, "SELECT * FROM tb_categories ORDER BY categories_id DESC");
                            while($r = mysqli_fetch_array($kategori)){
                        ?>
                        <option value="<?php echo $r['categories_id'] ?>" <?php echo ($r['categories_id'] == $g->categories_id)? 'selected':''; ?>><?php echo $r['categories_name'] ?></option>
                        <?php } ?>
                    </select>

                    <input type="text" name="nama" class="input-control" placeholder="Nama Gallery" 
                    value="<?php echo $g->gallery_name ?>" required>

                    <img src="./gallery/<?php echo $g->gallery_image ?>" width="100px">

                    <input type="hidden" name="foto" value="<?php echo $g->gallery_image?>">

                    <input type="file" name="gambar" class="input-control">
        
                    <select name="status" class="input-control">
                        <option value="">--Pilih--</option>
                        <option value="1" <?php echo ($g->status_gallery == 1)? 'selected': '';?>>Aktif</option>
                        <option value="0" <?php echo ($g->status_gallery == 0)? 'selected': '';?>>Tidak Aktif</option>
                    </select>

                    <textarea id="deskripsi" name="deskripsi" placeholder="Deskripsi" class="input-control"><?php echo $g->gallery_desc ?></textarea><br>

                    <input type="text" name="map_embed" class="input-control" placeholder="Embed Code Peta (optional)" value="<?php echo $g->map_embed ?>">
                    <textarea id="deskripsi" name="map_desc" placeholder="Deskripsi map" class="input-control"><?php echo $g->description ?></textarea>
                    
                    <input type="submit" name="submit" value="submit" class="btn">
                </form>

                <?php
                if (isset($_POST['submit'])) {
                    //data inputan dari form
                    $kategori   = mysqli_real_escape_string($conn, $_POST['kategori']);
                    $nama       = mysqli_real_escape_string($conn, $_POST['nama']);
                    $status     = mysqli_real_escape_string($conn, $_POST['status']);
                    $deskripsi  = mysqli_real_escape_string($conn, $_POST['deskripsi']);
                    $map_embed  = mysqli_real_escape_string($conn, $_POST['map_embed']); 
                    $map_desc   = mysqli_real_escape_string($conn, $_POST['map_desc']); 
                
                    //data gambar yang baru
                    $filename   = $_FILES['gambar']['name'];
                    $tmp_name   = $_FILES['gambar']['tmp_name'];
                
                    $type1      = explode('.', $filename);
                    $type2      = strtolower(end($type1));
                
                    $newname    = 'gallery'.time().'.'.$type2;
                
                    $tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif', 'mp4');
                
                    //jika admin ganti gambar 
                    if($filename != ''){
                        if (!in_array($type2, $tipe_diizinkan)) {
                            echo '<script>alert("Format file tidak diizinkan")</script>';
                        } else {
                            unlink('./gallery/'.$foto); //hapus gambar lama
                            move_uploaded_file($tmp_name, './gallery/'.$newname); //upload gambar baru
                            $namagambar = $newname;
                        }
                    }else{
                        //jika admin tidak ganti gambar
                        $namagambar = $foto;
                    }
                
                    //query update data gallery
                    $update = mysqli_query($conn, "UPDATE gallery SET 
                                        categories_id       = '".$kategori."',
                                        gallery_name        = '".$nama."', 
                                        gallery_image       = '".$namagambar."',
                                        gallery_desc        = '".$deskripsi ."',
                                        map_embed           = '".$map_embed."',
                                        description         = '".$map_desc."',
                                        status_gallery      = '".$status."'
                                        WHERE gallery_id    = '".$g->gallery_id."'");
                
                    if ($update) {
                        echo '<script>alert("Ubah data berhasil")</script>';
                        echo '<script>window.location="data-gallery.php"</script>';
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

    <script>
        CKEDITOR.replace('deskripsi');
    </script>
</body>
</html>
