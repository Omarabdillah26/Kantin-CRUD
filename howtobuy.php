<?php
$page_title = "How to Buy";
include 'includes/config.php';
include 'includes/header.php';
?>

<section id="buy">
    <div class="container">
        <h2>Cara Membeli</h2>

        <form method="post" class="form-container">
            <h3>Pilih Menu</h3>
            <div class="menu-grid">
                <?php 
                $menus = $conn->query("SELECT m.*, c.name as cafeteria_name FROM menus m JOIN cafeterias c ON m.cafeteria_id = c.id");
                while($menu = $menus->fetch_assoc()): 
                ?>
                <div class="menu-card">
                    <input type="checkbox" 
                           id="menu-<?php echo $menu['id']; ?>" 
                           name="menu[]" 
                           value="<?php echo $menu['id']; ?>"
                           onchange="updateTotal()"
                           class="menu-checkbox">
                    <label for="menu-<?php echo $menu['id']; ?>" class="menu-label">
                        <div class="menu-image">
                            <img src="<?php echo $base_url; ?>assets/images/menu/<?php echo $menu['image'] ?: 'default.jpg'; ?>" alt="<?php echo $menu['name']; ?>">
                        </div>
                        <div class="menu-details">
                            <h4><?php echo $menu['name']; ?></h4>
                            <p class="cafeteria"><?php echo $menu['cafeteria_name']; ?></p>
                            <p class="price"><?php echo format_rupiah($menu['price']); ?></p>
                        </div>
                    </label>
                </div>
                <?php endwhile; ?>
            </div>

            <div class="total-box">
                <p>Total Harga: <span id="total">Rp0</span></p>
            </div>

            <button type="button" onclick="showSummary()" class="pay-button">Bayar Sekarang</button>
        </form>

        <!-- Ringkasan Pembayaran -->
        <div id="orderSummary" class="payment-container" style="display: none;">
            <h3>Ringkasan Pembayaran</h3>
            <div class="order-summary">
                <ul id="orderList"></ul>
                <p class="total-amount">Total: <span id="summaryTotal">Rp0</span></p>
            </div>
        </div>
    </div>
</section>

<style>
/* Gaya seperti yang kamu pakai sebelumnya */
.menu-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 20px;
    margin: 20px 0;
}
.menu-card {
    border: 1px solid #ddd;
    border-radius: 8px;
    overflow: hidden;
    transition: transform 0.3s ease;
}
.menu-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}
.menu-checkbox {
    display: none;
}
.menu-checkbox:checked + .menu-label {
    background-color: #f0f8ff;
    border: 2px solid #4CAF50;
}
.menu-label {
    display: block;
    cursor: pointer;
    padding: 10px;
}
.menu-image img {
    width: 100%;
    height: 150px;
    object-fit: cover;
}
.menu-details {
    padding: 10px 5px;
}
.menu-details h4 {
    margin: 5px 0;
}
.price {
    font-weight: bold;
    color: #e53935;
}
.total-box {
    background: #f8f9fa;
    padding: 15px;
    border-radius: 5px;
    margin: 20px 0;
    text-align: right;
    font-size: 1.2em;
}
.pay-button {
    background: #4CAF50;
    color: white;
    border: none;
    padding: 12px 20px;
    border-radius: 5px;
    cursor: pointer;
    width: 100%;
}
.payment-container {
    margin-top: 30px;
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 8px;
    background: #f9f9f9;
}
.order-summary ul {
    list-style-type: none;
    padding: 0;
}
.order-summary li {
    padding: 5px 0;
    border-bottom: 1px dashed #eee;
}
.total-amount {
    text-align: right;
    font-size: 1.2em;
    margin-top: 10px;
}
</style>

<script>
function updateTotal() {
    const checkboxes = document.querySelectorAll('input[name="menu[]"]:checked');
    let total = 0;

    checkboxes.forEach(checkbox => {
        const priceText = checkbox.closest('.menu-card').querySelector('.price').innerText;
        const price = parseInt(priceText.replace(/[^0-9]/g, ''));
        total += price;
    });

    document.getElementById("total").innerText = "Rp" + total.toLocaleString("id-ID");
}

function showSummary() {
    const checkboxes = document.querySelectorAll('input[name="menu[]"]:checked');
    if (checkboxes.length === 0) {
        alert("Silakan pilih menu terlebih dahulu.");
        return;
    }

    let total = 0;
    const orderList = document.getElementById("orderList");
    orderList.innerHTML = "";

    checkboxes.forEach(checkbox => {
        const card = checkbox.closest('.menu-card');
        const name = card.querySelector('h4').innerText;
        const priceText = card.querySelector('.price').innerText;
        const price = parseInt(priceText.replace(/[^0-9]/g, ''));

        const li = document.createElement('li');
        li.textContent = `${name} - ${priceText}`;
        orderList.appendChild(li);

        total += price;
    });

    document.getElementById("summaryTotal").innerText = "Rp" + total.toLocaleString("id-ID");
    document.getElementById("orderSummary").style.display = "block";
    document.getElementById("orderSummary").scrollIntoView({ behavior: 'smooth' });
}
</script>

<?php include 'includes/footer.php'; ?>
