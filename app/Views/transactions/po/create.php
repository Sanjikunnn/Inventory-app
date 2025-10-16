<h2>Buat PO Baru</h2>
<form action="/po" method="post">
    <label>Supplier:</label>
    <select name="supplier_id">
        <?php foreach($suppliers as $s): ?>
            <option value="<?= $s['id'] ?>"><?= $s['name'] ?></option>
        <?php endforeach; ?>
    </select>

    <h3>Items</h3>
    <div id="items">
        <div>
            <select name="items[0][item_id]">
                <?php foreach($items as $i): ?>
                    <option value="<?= $i['id'] ?>"><?= $i['name'] ?></option>
                <?php endforeach; ?>
            </select>
            <select name="items[0][warehouse_id]">
                <?php foreach($warehouses as $w): ?>
                    <option value="<?= $w['id'] ?>"><?= $w['name'] ?></option>
                <?php endforeach; ?>
            </select>
            <input type="number" name="items[0][qty]" value="1">
            <input type="number" name="items[0][price]" value="0">
        </div>
    </div>
    <button type="submit">Simpan PO</button>
</form>
