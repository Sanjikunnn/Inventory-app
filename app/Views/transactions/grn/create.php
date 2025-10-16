<h1>Buat GRN dari PO #<?= $po['po_number'] ?></h1>

<form action="/grn" method="post">
    <?= csrf_field() ?>
    <input type="hidden" name="po_id" value="<?= $po['id'] ?>">

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Item</th>
                <th>Warehouse</th>
                <th>Qty</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($items as $item): ?>
            <tr>
                <td><?= $item['item_id'] ?></td>
                <td><?= $item['warehouse_id'] ?></td>
                <td>
                    <input type="number" name="items[<?= $item['id'] ?>][qty]" value="<?= $item['qty'] ?>" class="form-control">
                    <input type="hidden" name="items[<?= $item['id'] ?>][item_id]" value="<?= $item['item_id'] ?>">
                    <input type="hidden" name="items[<?= $item['id'] ?>][warehouse_id]" value="<?= $item['warehouse_id'] ?>">
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <button type="submit" class="btn btn-primary">Buat GRN</button>
</form>

