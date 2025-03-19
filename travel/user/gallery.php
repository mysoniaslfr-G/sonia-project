<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,700;1,900&display=swap" rel="stylesheet">


    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css"
    rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <title>travel | Completed</title>
</head>
<body>

<!-- Header -->
<header>
  <nav class="navbar">
    <a href="#" class="navbar-logo">
      <i class="ri-spy-fill"></i> travel<span>memories</span>
    </a>

    <div class="navbar-nav">
      <a href="ind.php#home">Home</a>
      <a href="ind.php#categories">Categories</a>
      <a href="ind.php#about">About</a>
      <a href="ind.php#gallery">Gallery</a>
      <a href="ind.php#contact">Contact</a>
      <a href="ind.php#comments">Comments</a>
    </div>

    <div class="search">
      <div class="search-container">
        <form action="gallery.php">
        <input 
            type="text" 
            name="search" 
            placeholder="Search" 
            value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search'], ENT_QUOTES, 'UTF-8') : ''; ?>" 
        />

        <input type="hidden" name="kat" value="<?php echo isset($_GET['kat']) ? htmlspecialchars($_GET['kat'], ENT_QUOTES, 'UTF-8') : ''; ?>">


          <button type="submit" name="cari" class="search-button">
            <i class="ri-search-line"></i>
          </button>
        </form>
      </div>
    </div>

    <div class="navbar-extra">
      <a href="#" id="hamburger-menu"><i class="ri-menu-3-line"></i></a>
    </div>
  </nav>
</header>

    

     <!-- Gallery -->
     <?php
            // Koneksi ke database
            include '../admin/db.php';

            // Definisikan variabel $where terlebih dahulu untuk menghindari error
            $where = "";

            if (isset($_GET['search']) && $_GET['search'] != '' || isset($_GET['kat']) && $_GET['kat'] != '') {
                $search = isset($_GET['search']) ? $_GET['search'] : '';
                $kat = isset($_GET['kat']) ? $_GET['kat'] : '';
                $where = "AND gallery_name LIKE '%" . $search . "%' AND categories_id LIKE '%" . $kat . "%' ";
            }

            // Ambil data gallery dari database
            $gallery = mysqli_query($conn, "SELECT * FROM gallery WHERE status_gallery = 1 $where ORDER BY gallery_id DESC");
        ?>


        <section class="gallery" id="gallery">
            <div class="container">
                <!-- Heading -->
                <h1 class="gallery-heading">My <span>Gallery</span></h1>

                <div class="box-gallery">
                    <?php
                    if (mysqli_num_rows($gallery) > 0) {
                        while ($g = mysqli_fetch_array($gallery)) {
                    ?>
                        <a href="details.php?id=<?php echo $g['gallery_id'] ?>">
                            <div class="gallery-item">
                                <img src="../admin/gallery/<?php echo $g ['gallery_image']; ?>" 
                                    alt="<?php echo $g ['gallery_name']; ?>" 
                                    data-aos="zoom-in" 
                                    data-aos-duration="1000" 
                                    data-aos-delay="100">
                                    <div class="gallery-caption">
                                        <?php echo $g ['gallery_name']; ?>
                                    </div>
                        </a>
                            </div>
                    <?php
                        }
                    } else {
                        echo '<p>Tidak ada data gallery.</p>';
                    }
                    ?>
                </div>

                <!-- Tambahkan tombol kembali -->
                <div class="back-to-category" data-aos="zoom-in">
                    <a href="ind.php#categories" class="btn-back">Back to Categories<i class="ri-arrow-right-s-line"></i></a>
                </div>
            </div>
        </section>
        <!-- Gallery -->

     
     <!-- Footer -->
     <section class="footer" id="footer">
        <div class="footer-box">
            <a href="#" class="logo"><i class="ri-spy-fill"></i> travelmemories</a>
            <p>"Discover the Wonders of <br>Indonesia's Nature and Culture!"</p>
            <div class="social">
                <a href="https://www.facebook.com" target="_blank"><i class="ri-facebook-fill"></i></a>
                <a href="https://www.instagram.com" target="_blank"><i class="ri-instagram-fill"></i></a>
                <a href="https://www.twitter.com" target="_blank"><i class="ri-twitter-fill"></i></a>
                <a href="https://www.youtube.com" target="_blank"><i class="ri-youtube-fill"></i></a>
            </div>
        </div>
    
        <div class="footer-box">
            <h2>Categories</h2>
            <a href="https://www.panorama-destination.com/travel-tips-indonesia/top-10-natural-wonders-indonesia/">Natural Attractions</a>
            <a href="https://whc-unesco-org.translate.goog/en/statesparties/id?_x_tr_sl=en&_x_tr_tl=id&_x_tr_hl=id&_x_tr_pto=tc">Cultural Heritage</a>
            <a href="https://adventureindonesia.com/">Adventure</a>
            <a href="https://www.indonesia.travel/gb/en/event-festivals.html">Festivals and Events</a>
        </div>
        
        <div class="footer-box">
            <h2>Useful Links</h2>
            <a href="https://www.mjninetour.com/?gad_source=1&gclid=CjwKCAjwpbi4BhByEiwAMC8JnUnRYhm6MKLaFiV0jPsrI2g9ykqwSBnNfVtvJ9a_8y1xXL8YX3DemRoCIPYQAvD_BwE">Travel Guide</a>
            <a href="https://thetravelinsider.co/sg/en/destinations/indonesia?s_cid=grm:sg:paid:sea:go:na:tx:na:travelinsi:220424-evergreen:ti-ao-sem:destination-indonesia&vid=MindshareSG&pid=TISEMPRSTR&ef_id=CjwKCAjwpbi4BhByEiwAMC8JnbTRg9Gub0fskN0HNejQnoV5YgQDpVpCUNBX86dxZ60Z-q59vr_6mhoCwNoQAvD_BwE:G:s&s_kwcid=AL!810!3!696994748379!b!!g!!indonesia%20tour%20packages!21205158917!164945253487&gad_source=1&gclid=CjwKCAjwpbi4BhByEiwAMC8JnbTRg9Gub0fskN0HNejQnoV5YgQDpVpCUNBX86dxZ60Z-q59vr_6mhoCwNoQAvD_BwE&gclsrc=aw.ds">Travel Tips</a>
            <a href="activities-attractions.html">Activities & Attractions</a>
            <a href="https://weebio.link/ojnq6?gad_source=1&gclid=CjwKCAjwpbi4BhByEiwAMC8JncyFWXv_kzM2UUEdhEXVHads2iBg4iTf0VmXaMiXX0NM4FYP9IyebhoC0C0QAvD_BwE">My Blog</a>
        </div>
    
        <div class="footer-box">
            <h2>Newsletter</h2>
            <a href="../admin/login.php">MyAdmin</a>
            <a href="#">Insights</a>
            <a href="#">Alerts</a>
            <a href="#">Announcements</a>
        </div>
    </section>
    
    <!--Copyright-->
    <div class="copyright">
        <p>&#169; Tugas Pemograman Web Lanjut 2024</p>
    </div>
    
    <!-- Scroll Down Button -->
    <button id="scrollDownButton" class="scroll-button">
    <i class="ri-arrow-down-fill"></i>
    </button>

    <!-- Scroll Up Button -->
    <button id="scrollUpButton" class="scroll-button">
    <i class="ri-arrow-up-fill"></i></i>
    </button>

    

    <script src="../js/script.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>