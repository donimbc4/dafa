<?php
// Mulai session untuk mengakses session yang sedang aktif
session_start();

// Hapus semua data sesi
session_unset();

// Hancurkan session
session_destroy();

// Redirect pengguna ke halaman login setelah logout
header("Location: login.php");
exit();
?>
