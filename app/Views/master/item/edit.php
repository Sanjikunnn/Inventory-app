<h2>Edit Item</h2>
<form action="/items/update/<?= $item['id'] ?>" method="post">
    SKU: <input type="text" name="sku" value="<?= $item['sku'] ?>"><br>
    Name: <input type="text" name="name" value="<?= $item['name'] ?>"><br>
    Description: <textarea name="description"><?= $item['description'] ?></textarea><br>
    Unit: <input type="text" name="unit" value="<?= $item['unit'] ?>"><br>
    Price: <input type="number" step="0.01" name="price" value="<?= $item['price'] ?>"><br>
    Min Stock: <input type="number" name="min_stock" value="<?= $item['min_stock'] ?>"><br>
    <button type="submit">Update</button>
</form>
<a href="/items">Kembali</a>
