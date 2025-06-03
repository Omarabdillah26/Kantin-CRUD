CREATE TABLE menu (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    harga INT NOT NULL
);
INSERT INTO menu (nama, harga) VALUES
('Nasi Goreng', 10000),
('Mie Ayam', 8000),
('Teh Manis', 5000);
CREATE TABLE transaksi (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_pembeli VARCHAR(100) NOT NULL,
    total_harga INT NOT NULL,
    tanggal DATETIME DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE transaksi_detail (
    id INT AUTO_INCREMENT PRIMARY KEY,
    transaksi_id INT NOT NULL,
    menu_id INT NOT NULL,
    FOREIGN KEY (transaksi_id) REFERENCES transaksi(id),
    FOREIGN KEY (menu_id) REFERENCES menu(id)
);



