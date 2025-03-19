<?php
    include 'db.php';

    if(isset($_GET['idk'])){
        $delete = mysqli_query($conn, "DELETE FROM tb_categories WHERE categories_id = '".$_GET['idk']."'");
        echo '<script>window.location="data-kategori.php"</script>';
    }

    if(isset($_GET['idg'])){
        $gallery = mysqli_query($conn, "SELECT gallery_image FROM gallery WHERE gallery_id = '".$_GET['idg']."' ");
        $g = mysqli_fetch_object($gallery);

        unlink('./gallery/'.$g->gallery_image);

        $delete = mysqli_query($conn, "DELETE FROM gallery WHERE gallery_id = '".$_GET['idg']."' ");
        echo '<script>window.location="data-gallery.php"</script>';
    }


?>