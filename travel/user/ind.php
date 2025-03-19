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
      <a href="#home">Home</a>
      <a href="#categories">Categories</a>
      <a href="#about">About</a>
      <a href="#gallery">Gallery</a>
      <a href="#contact">Contact</a>
      <a href="#comments">Comments</a>
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

        <!-- Carousel Container -->
        <div id="home"  class="carousel next" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="1000">
        <div class="list">
            <!-- Item 1 -->
            <div class="item">
                <img src="../image/gunung.jpg" alt="Bromo">
                <div class="content">
                    <div class="author">BROMO</div>
                    <div class="title">MOUNTAIN</div>
                    <div class="topic">NATURE</div>
                    <div class="desc">
                        Mount Bromo, standing at 2,329 meters, is surrounded by the Tengger Sand Sea.
                        The misty view during sunrise makes it a popular tourist destination.
                    </div>
                    <div class="buttons">
                        <button class="btn-like" onclick="showLove()">LIKE</button>
                    </div>
                </div>
            </div>

            <!-- Item 2 -->
            <div class="item">
                <img src="../image/ampatt.jpg" alt="Raja Ampat">
                <div class="content">
                    <div class="author">RAJA AMPAT</div>
                    <div class="title">ISLAND</div>
                    <div class="topic">NATURE</div>
                    <div class="desc">
                        Raja Ampat is renowned for its underwater beauty. Its cluster of islands and coral reefs are the main attractions for tourists.
                    </div>
                    <div class="buttons">
                        <button class="btn-like" onclick="showLove()">LIKE</button>
                    </div>
                </div>
            </div>

           <!-- Item 3 -->
            <div class="item">
                 <img src="../image/bud.jpg" alt="Candi Borobudur">
                 <div class="content">
                    <div class="author">BOROBUDUR</div>
                    <div class="title">TEMPLE</div>
                    <div class="topic">CULTURE</div>
                    <div class="desc">
                        Borobudur is the largest Buddhist temple in the world, located in Central Java, Indonesia. As a UNESCO World Heritage site, it has become a major destination for historical and cultural tourism.
                    </div>
                    <div class="buttons">
                        <button class="btn-like" onclick="showLove()">LIKE</button>
                    </div>
                </div>
            </div>


            <!-- Item 4 -->
            <div class="item">
                <img src="../image/wall.jpg" alt="Wakatobi">
                <div class="content">
                    <div class="author">KAWAH IJEN</div>
                    <div class="title">CRATER</div>
                    <div class="topic">ADVENTURE</div>
                    <div class="desc">
                        Kawah Ijen, located in East Java, is renowned for its stunning turquoise acid lake and the blue 
                        flames that can be seen at night,
                         making it a popular destination for adventure seekers and photographers.
                    </div>
                    <div class="buttons">
                        
                        <button class="btn-like" onclick="showLove()">LIKE</button>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Thumbnail Section -->
    <div class="thumbnail">
        <!-- Thumbnail 1 -->
        <div class="item">
            <img src="../image/wall.jpg" alt="kawah">
            <div class="content">
                <div class="title">KAWAH IJEN</div>
                <div class="des">Description</div>
                </div>
            </div>

        <!-- Thumbnail 2 -->
        <div class="item">
            <img src="../image/bud.jpg" alt="Borobudur">
            <div class="content">
                <div class="title">BOROBUDUR TEMPLE</div>
                <div class="des">Description</div>
            </div>
        </div>

        <!-- Thumbnail 3 -->
        <div class="item">
            <img src="../image/ampatt.jpg" alt="raja ampat">
            <div class="content">
                <div class="title">RAJA AMPAT</div>
                <div class="des">Description</div>
            </div>
        </div>

    <!-- Thumbnail 4-->
        <div class="item">
            <img src="../image/gunung.jpg" alt="bromo" >
            <div class="content">
                <div class="title">BROMO</div>
                <div class="des">Description</div>
            </div>
        </div>

    </div>
    

    <!-- Navigation Arrows -->
    <div class="arrows">
        <button id="prev" onclick="toggleDescription(this)"><i class="ri-arrow-left-s-line"></i></button>
        <button id="next" onclick="toggleDescription(this)"><i class="ri-arrow-right-s-line"></i></button>
    </div>
    

    <div class="time"></div>
    
    <!-- Kontainer untuk love animation -->
    <div id="love-container"></div>


    <!--Category-->
    <section class="categories" id="categories" data-aos="fade-right" data-aos-duration="1000">
        <div class="heading">
            <h1>Browse Our Hottest<br><span>Categories</span></h1>
            <a href="#gallery" class="btn-see-all">See All<i class="ri-arrow-right-s-line"></i></a>
        </div>

        <div class="categories-conatiner" data-aos="fade-right" data-aos-duration="2000">
            <?php
            include '../admin/db.php'; // Koneksi ke database

            // Query untuk mendapatkan data kategori
            $kategori = mysqli_query($conn, "SELECT * FROM tb_categories ORDER BY categories_id DESC");
            if (mysqli_num_rows($kategori) > 0) {
                while ($row = mysqli_fetch_array($kategori)) {
            ?>
                <div class="box box<?php echo $row['categories_id']; ?> " 
                    style="background: var(--light-green);"> <!-- Ganti sesuai ID -->
                    <img src="../admin/category/<?php echo $row['categories_image']; ?>" 
                        alt="<?php echo $row['categories_name']; ?>">
                    <h2><?php echo $row['categories_name']; ?></h2>
                    <span><?php echo $row['categories_desc']; ?></span>
                    <a href="gallery.php?kat=<?php echo $row['categories_id']; ?>">
                        <i class="ri-arrow-right-s-line"></i>
                    </a>
                </div>
            <?php
                }
            } else {
                echo '<p>No categories found.</p>';
            }
            ?>
        </div>
    </section>

    <!-- About -->
    <section class="about" id="about">
        <div class="container">
            <div class="box-about">
                <div class="box" data-aos="fade-right" data-aos-duration="1000">
                    <h1>Indonesian <span>Tourism </span></h1>
                    <p id="summary">
                        Indonesia, the largest archipelago in the world with over 17,000 islands, possesses extraordinary natural 
                        and cultural wealth, including mountains, beaches, lakes, tropical rainforests, as well as a rich cultural and historical heritage. 
                        This makes Indonesia one of the most fascinating and diverse tourist destinations in the world.
                    </p>
                    <p id="more-text" style="display: none;">
                        Indonesia's diverse ecosystems host an incredible variety of flora and fauna, making it a paradise for nature lovers and adventure seekers. 
                        From the stunning rice terraces in Ubud to the magnificent underwater world of Raja Ampat, 
                        Indonesia offers endless opportunities for exploration and discovery. 
                        The warmth and hospitality of the Indonesian people further enhance the experience, 
                        making every visit memorable. 
                        Whether you're seeking relaxation on the pristine beaches or an adrenaline rush through the jungle, 
                        Indonesia has something for everyone.
                    </p>
                    <button id="see-more-btn" onclick="toggleText()">Read More</button>
                </div>
                <div class="box" data-aos="zoom-in" data-aos-duration="1000">
                    <img src="../image/wktobi.jpg" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- About -->

    

     <!-- Gallery -->
        <?php
            $gallery = mysqli_query($conn, "SELECT * FROM gallery WHERE status_gallery = 1 ORDER BY gallery_id DESC");
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
                        <div class="gallery-item">
                            <img src="../admin/gallery/<?php echo $g ['gallery_image']; ?>" 
                                alt="<?php echo $g ['gallery_name']; ?>" 
                                data-aos="zoom-in" 
                                data-aos-duration="1000" 
                                data-aos-delay="100">
                                <div class="gallery-caption">
                                    <?php echo $g ['gallery_name']; ?>
                                </div>
                        </div>
                    <?php
                        }
                    } else {
                        echo '<p>Tidak ada data gallery.</p>';
                    }
                    ?>
                </div>
                <div class="back-to-category" data-aos="zoom-in">
                    <a href="#categories" class="btn-back">Back to Categories<i class="ri-arrow-right-s-line"></i></a>
                </div>
            </div>
        </section>
        <!-- Gallery -->


<section class="contact" id="contact">
    <div class="container">
        <div class="box-contact">
            <h1 data-aos="fade-right" data-aos-duration="1000" data-aos-delay="100">Contact</h1>
            <form action="process_comment.php" method="POST" enctype="multipart/form-data" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="500">
                <table>
                    <tr>
                        <td><label for="nama">Name</label></td>
                        <td><input type="text" id="nama" name="nama" placeholder="Enter your Nama" autocomplete="off" required></td>
                    </tr>
                    <tr>
                        <td><label for="email">Email</label></td>
                        <td><input type="email" id="email" name="email" placeholder="Enter your Email" autocomplete="off" required></td>
                    </tr>
                    <tr>
                        <td><label for="pesan">Comment</label></td>
                        <td><textarea name="pesan" id="pesan" placeholder="Enter your Comment..." autocomplete="off" required></textarea></td>
                    </tr>
                    <tr>
                        <td><label for="rating">Rating</label></td>
                        <td>
                            <label><input type="radio" name="rating" value="1" required> 1</label>
                            <label><input type="radio" name="rating" value="2"> 2</label>
                            <label><input type="radio" name="rating" value="3"> 3</label>
                            <label><input type="radio" name="rating" value="4"> 4</label>
                            <label><input type="radio" name="rating" value="5"> 5</label>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="profile_picture"> Profile</label></td>
                        <td><input type="file" id="profile_picture" name="profile_picture" accept="image/*" required></td>
                    </tr>
                    <tr>
                    <td colspan="2">
                        <button type="submit" class="komen" aria-label="Kirim Komentar">Kirim</button>
                    </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</section>

     <!--Commentar-->
     <section class="comments" id="comments">
        <h2>Why Tourist's <span>Love Us?</span></h2>
        <div class="comments-container">
            <?php
            // Koneksi database
            $conn = new mysqli('localhost', 'root', '', 'travel_db');

            // Query komentar
            $query = "SELECT * FROM comments ORDER BY id DESC";
            $result = $conn->query($query);

            // Tampilkan setiap komentar
            while ($row = $result->fetch_assoc()) {
                echo '
                <div class="box" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="300">
                    <i class="ri-double-quotes-l"></i>
                    <div class="stars">';
                for ($i = 1; $i <= 5; $i++) {
                    echo $i <= $row['rating'] ? '<i class="ri-star-fill"></i>' : '<i class="ri-star-line"></i>';
                }
                echo '</div>
                    <p>' . htmlspecialchars($row['pesan']) . '</p>
                    <div class="review-profile">
                        <img src="uploads/' . htmlspecialchars($row['profile_picture']) . '" alt="">
                        <h3>' . htmlspecialchars($row['nama']) . '</h3>
                    </div>
                </div>';}
            ?>
        </div>
    </section>
    <!--Commentar-->
     
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