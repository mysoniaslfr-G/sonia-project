<?php
session_start();
include 'db.php';

// Ensure that the user is logged in
if($_SESSION['status_login'] != true){
    echo '<script>window.location="login.php"</script>';
}

// Handle delete request
if(isset($_GET['delete_id'])){
    $delete_id = $_GET['delete_id'];

    // Ensure the id is a valid integer to avoid SQL injection
    $delete_id = intval($delete_id);

    // Delete query
    $delete_query = "DELETE FROM comments WHERE id = $delete_id";

    if(mysqli_query($conn, $delete_query)){
        echo "<script>alert('Comment deleted successfully!'); window.location='coment-admin.php';</script>";
    } else {
        echo "<script>alert('Error deleting comment!'); window.location='coment-admin.php';</script>";
    }
}
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

    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css"
    rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
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
            <h1>Manage Comments</h1>
            <div class="box">
                <table border="1" cellspacing="0" class="table">
                    <thead>
                        <tr>
                            <th width="60px">No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Comment</th>
                            <th width="165px">Rating</th>
                            <th>Profile Picture</th>
                            <th width="100px">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        // Query untuk menampilkan komentar-komentar
                        $comments = mysqli_query($conn, "SELECT * FROM comments ORDER BY id DESC");
                        if(mysqli_num_rows($comments) > 0){
                            while ($row = mysqli_fetch_assoc($comments)) {
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo htmlspecialchars($row['nama']); ?></td>
                            <td><?php echo htmlspecialchars($row['email']); ?></td>
                            <td><?php echo htmlspecialchars($row['pesan']); ?></td>
                            <td>
                                <?php
                                for ($i = 1; $i <= 5; $i++) {
                                    echo $i <= $row['rating'] ? '<i class="ri-star-fill"></i>' : '<i class="ri-star-line"></i>';
                                }
                                ?>
                            </td>
                            <td><img src="../user/uploads/<?php echo htmlspecialchars($row['profile_picture']); ?>" alt="Profile Picture" width="50px" height="50px"></td>
                            <td>
                                <a href="coment-admin.php?delete_id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this comment?')" class="btn">Delete</a>
                            </td>
                        </tr>
                        <?php 
                            }
                        } else { 
                        ?>
                        <tr>
                            <td colspan="7">No comments found</td>
                        </tr>
                        <?php } ?>
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
