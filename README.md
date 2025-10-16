Struktur Relasi Antar Tabel
users — dipakai di banyak tabel (purchase_orders, sales_orders, dll)
items — produk utama
warehouses — lokasi stok
item_stocks — relasi item ↔ warehouse
suppliers — untuk pembelian
customers — untuk penjualan
purchase_orders — transaksi pembelian
purchase_order_items — item per purchase order
goods_receipts — penerimaan barang
goods_receipt_items — item per penerimaan
sales_orders — transaksi penjualan
sales_order_items — item per penjualan
deliveries — pengiriman ke customer
delivery_items — item per pengiriman
stock_movements — log keluar/masuk barang