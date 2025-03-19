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
    <title>admin | Travel</title>

    <link rel="stylesheet" type="text/css" href="../css/style_admin.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body>
    <!-- header --->
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
            <h1>Data Gallery</h1>
            <div class="box">
                <p><a href="tambah-gallery.php">Tambah Data Gallery</a></p>
               <table border="1" cellspacing="0" class="table">
                <thead>
                    <tr>
                        <th width="60px">No</th>
                        <th>Kategori</th>
                        <th>Nama Gallery</th>
                        <th>Gambar</th>
                        <th>Status</th>
                        <th width="165px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $no = 1;
                        $gallery = mysqli_query($conn, "SELECT * FROM gallery LEFT JOIN tb_categories USING (categories_id) ORDER BY gallery_id DESC");
                        if(mysqli_num_rows($gallery) > 0){
                        while($row = mysqli_fetch_array($gallery)){
                    ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $row['categories_name'] ?></td>
                        <td><?php echo $row['gallery_name'] ?></td>
                        <td><img src="gallery/<?php echo $row['gallery_image']; ?>" width="50px"></td>
                       
                        <td><?php echo ($row['status_gallery'] == 0)? 'Tidak Aktif':'Aktif'; ?></td>
                        <td>
                            <a href="edit-gallery.php?id=<?php echo $row['gallery_id'] ?>" class="btn-edit">Edit</a>
                            <a href="proses-hapus.php?idg=<?php echo $row['gallery_id'] ?>"
                             onclick="return confirm('Yakin ingin menghapus data?')" class="btn">Hapus</a>
                        </td>
                    </tr>
                    <?php }}else { ?>
                        <tr>
                            <td colspan="7">Tidak ada data</td>
                        </tr>
                    <?php }?>
                </tbody>
               </table>
            </div>
        </div>
     </div>

     <!--footer-->
     <footer>
        <div class="container">
            <small>Copyright &copy; 2024 - Admintravel</small>
        </div>
     </footer>
    
</body>
</html>
