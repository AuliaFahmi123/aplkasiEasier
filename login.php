<?php

$conn = mysqli_connect("localhost", "root", "", "easier");
$result = mysqli_query($conn, "SELECT * FROM login");
 
$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    
    // Verifikasi password (asumsi password disimpan dalam bentuk plain text)
    // Jika menggunakan hashing seperti password_hash, gunakan password_verify untuk memverifikasi
    if ($password == $row['password']) {
        // Login berhasil
        echo "Login berhasil! Selamat datang, " . $row['username'];
    } else {
        // Password salah
        echo "Password salah!";
    }
} else {
    // Username tidak ditemukan
    echo "Username tidak ditemukan!";
}
