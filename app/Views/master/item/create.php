<h2>Tambah Item</h2>
<form action="/items/store" method="post">
    SKU: <input type="text" name="sku"><br>
    Name: <input type="text" name="name"><br>
    Description: <textarea name="description"></textarea><br>
    Unit: <input type="text" name="unit"><br>
    Price: <input type="number" step="0.01" name="price" value="0.00"><br>
    Min Stock: <input type="number" name="min_stock" value="0"><br>
    <button type="submit">Simpan</button>
</form>
<a href="/items">Kembali</a>
