<?php
    session_start();
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
            <h1>Dashboard</h1>
            <div class="box">
                <h4>Welcome <?php echo $_SESSION['a_global']->admin_name ?> di Admin Travel</h4>
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

