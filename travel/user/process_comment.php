<?php
// Koneksi ke database
$conn = new mysqli('localhost', 'root', '', 'travel_db');

// Validasi koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data dari form
$nama = $_POST['nama'];
$email = $_POST['email'];
$pesan = $_POST['pesan'];
$rating = $_POST['rating'];
$profile_picture = $_FILES['profile_picture'];

// Escape input untuk menghindari masalah SQL injection atau karakter khusus
$nama = $conn->real_escape_string($nama);
$email = $conn->real_escape_string($email);
$pesan = $conn->real_escape_string($pesan);
$rating = $conn->real_escape_string($rating);

// Proses upload foto
$target_dir = "uploads/";
$target_file = $target_dir . basename($profile_picture["name"]);
move_uploaded_file($profile_picture["tmp_name"], $target_file);

// Simpan ke database
$query = "INSERT INTO comments (nama, email, pesan, rating, profile_picture) VALUES ('$nama', '$email', '$pesan', '$rating', '" . $profile_picture['name'] . "')";
if ($conn->query($query) === TRUE) {
    echo "Komentar berhasil dikirim!";
    header("Location: ind.php#comments"); 
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
}

$conn->close();
?>
s