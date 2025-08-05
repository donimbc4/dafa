<?php
require_once 'config/config.php';  // Menghubungkan dengan konfigurasi umum
require_once 'config/database.php';  // Menghubungkan dengan kelas database

// Pastikan pengguna sudah login, jika sudah, redirect ke dashboard atau halaman utama
if (isLoggedIn()) {
    redirect('index.php');  // Redirect ke halaman utama jika sudah login
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Membuat objek Database dan mendapatkan koneksi
    $database = new Database();
    $db = $database->getConnection();  // Menggunakan metode getConnection dari kelas Database

    $username = sanitize($_POST['username']);
    $password = $_POST['password'];

    // Cek apakah username ada di database
    $query = "SELECT * FROM users WHERE username = ?";
    $stmt = $db->prepare($query);
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verifikasi password
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];
        redirect('index.php');  // Redirect ke halaman utama setelah login berhasil
    } else {
        $error_message = "Username atau password salah.";
    }
}

$page_title = 'Login - Sistem Pakar Fitness';
include 'includes/header.php';  // Pastikan file header.php sesuai dengan path
?>

<div class="container">
    <div class="auth-form">
        <div class="card">
            <h2>Login</h2>
            
            <?php if(isset($error_message)): ?>
                <div class="alert alert-error"><?php echo $error_message; ?></div>
            <?php endif; ?>
            
            <form method="POST" action="">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" class="form-control" required>
                </div>
                
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>
                
                <button type="submit" class="btn btn-primary btn-block">
                    <i class="fas fa-sign-in-alt"></i> Login
                </button>
            </form>
            
            <p class="text-center">
                Belum punya akun? <a href="register.php">Daftar di sini</a>
            </p>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
