<?php
$page_title = "Daftar Kantin Sekolah";
include 'includes/config.php';
include 'includes/header.php';
?>

<section id="cafetaria">
    <div class="container">
        <h2>Daftar Kantin Sekolah</h2>

        <div class="kantin-container">
            <!-- Kantin Rika -->
            <div class="kantin-box">
                <h3 class="kantin-title">Kantin Rika</h3>
                <div class="kantin-content">
                    <div class="kantin-image">
                        <img src="<?php echo $base_url; ?>assets/images/kantin-rika.jpg" alt="Kantin Rika">
                    </div>
                    <div class="menu-list">
                        <div class="menu-item">
                            <img src="<?php echo $base_url; ?>assets/images/nasgor.jpg" alt="Nasi Goreng">
                            <p>Nasi Goreng - <?php echo format_rupiah(15000); ?></p>
                        </div>
                        <div class="menu-item">
                            <img src="<?php echo $base_url; ?>assets/images/rotibakar.jpg" alt="Mie Ayam">
                            <p>Mie Ayam - <?php echo format_rupiah(12000); ?></p>
                        </div>
                        <div class="menu-item">
                            <img src="<?php echo $base_url; ?>assets/images/esteh.jpg" alt="Es Teh">
                            <p>Es Teh - <?php echo format_rupiah(5000); ?></p>
                        </div>
                        <div class="menu-item">
                            <img src="<?php echo $base_url; ?>assets/images/bakso.jpg" alt="Bakso">
                            <p>Bakso - <?php echo format_rupiah(10000); ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kantin Riki -->
            <div class="kantin-box">
                <h3 class="kantin-title">Kantin Riki</h3>
                <div class="kantin-content">
                    <div class="kantin-image">
                        <img src="<?php echo $base_url; ?>assets/images/kantin-riki.jpg" alt="Kantin Riki">
                    </div>
                    <div class="menu-list">
                        <div class="menu-item">
                            <img src="<?php echo $base_url; ?>assets/images/batagor.jpg" alt="Sate Ayam">
                            <p>Sate Ayam - <?php echo format_rupiah(18000); ?></p>
                        </div>
                        <div class="menu-item">
                            <img src="<?php echo $base_url; ?>assets/images/esjeruk.jpg" alt="Gado-Gado">
                            <p>Gado-Gado - <?php echo format_rupiah(15000); ?></p>
                        </div>
                        <div class="menu-item">
                            <img src="<?php echo $base_url; ?>assets/images/sosisbakar.jpg" alt="Jus Alpukat">
                            <p>Jus Alpukat - <?php echo format_rupiah(10000); ?></p>
                        </div>
                        <div class="menu-item">
                            <img src="<?php echo $base_url; ?>assets/images/tahuisi.jpg" alt="Lumpia">
                            <p>Lumpia - <?php echo format_rupiah(8000); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .kantin-container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: center;
    }
    
    .kantin-box {
        width: 45%;
        border: 1px solid #ddd;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    
    .kantin-title {
        background-color: #f8f9fa;
        padding: 15px;
        margin: 0;
        text-align: center;
    }
    
    .kantin-content {
        display: flex;
        padding: 15px;
    }
    
    .kantin-image {
        width: 40%;
    }
    
    .kantin-image img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-radius: 4px;
    }
    
    .menu-list {
        width: 60%;
        padding-left: 15px;
    }
    
    .menu-item {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }
    
    .menu-item img {
        width: 60px;
        height: 60px;
        object-fit: cover;
        border-radius: 4px;
        margin-right: 10px;
    }
</style>

<?php include 'includes/footer.php'; ?>