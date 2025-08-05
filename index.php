<?php
require_once 'config/config.php';
$page_title = 'Sistem Pakar Rekomendasi Fitness untuk Pemula';
include 'includes/header.php';
?>

<div class="hero-section">
    <div class="container">
        <div class="hero-content">
            <h1>Sistem Pakar Rekomendasi Program Latihan Fitness</h1>
            <p>Dapatkan program latihan yang tepat untuk Anda sebagai pemula dengan teknologi Case Based Reasoning</p>
            
            <?php if(isLoggedIn()): ?>
                <a href="user/consultation.php" class="btn btn-primary btn-lg">
                    <i class="fas fa-play"></i> Mulai Konsultasi
                </a>
            <?php else: ?>
                <div class="cta-buttons">
                    <a href="register.php" class="btn btn-primary btn-lg">
                        <i class="fas fa-user-plus"></i> Daftar Sekarang
                    </a>
                    <a href="login.php" class="btn btn-outline btn-lg">
                        <i class="fas fa-sign-in-alt"></i> Login
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<div class="features-section">
    <div class="container">
        <h2>Informasi Utama Sistem</h2>
        <div class="features-grid">
            <div class="feature-card">
                <i class="fas fa-brain"></i>
                <h3>AI-Powered Recommendations</h3>
                <p>Menggunakan metode Case Based Reasoning untuk memberikan rekomendasi yang akurat</p>
            </div>
            <div class="feature-card">
                <i class="fas fa-user-md"></i>
                <h3>Khusus untuk Pemula</h3>
                <p>Program latihan yang aman dan efektif untuk pemula</p>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>