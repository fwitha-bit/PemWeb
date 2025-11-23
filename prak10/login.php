<?php
// Mulai session 
session_start();

$correct_username = "admin";
$correct_password = "password123";

// Periksa metode request adalah POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Periksa username dan password telah diisi
    if (isset($_POST['username']) && isset($_POST['password'])) {
        
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Validasi username dan password
        if ($username === $correct_username && $password === $correct_password) {
            
            // --- LOGIN BERHASIL ---
            
            // Simpan status login di session
            $_SESSION['login'] = true;
            $_SESSION['username'] = $username;

            // redirect ke halaman profil.html
            $success_message = "Login berhasil! Mengalihkan ke halaman profil...";
            header("Location: login.html?sukses=" . urlencode($success_message));
            exit; 

        } else {
            
            // --- LOGIN GAGAL ---
            
            // Buat pesan error 
            $error_message = "Username atau password salah!";
            
            // Kembalikan pengguna ke halaman login
            header("Location: login.html?error=" . urlencode($error_message));
            exit;
        }

    } else {
        // Jika kolom username atau password kosong
        $error_message = "Silakan isi semua kolom.";
        header("Location: login.html?error=" . urlencode($error_message));
        exit;
    }

} else {
    // Jika file diakses bukan melalui POST
    header("Location: login.html");
    exit;
}

?>