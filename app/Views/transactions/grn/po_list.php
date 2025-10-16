
<h2>PO Siap Dibuat GRN</h2>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>PO Number</th>
            <th>Supplier</th>
            <th>Total</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($purchaseOrders as $po): ?>
        <tr>
            <td><?= $po['id'] ?></td>
            <td><?= $po['po_number'] ?></td>
            <td><?= $po['supplier_id'] ?></td>
            <td><?= number_format($po['total_amount'], 2) ?></td>
            <td><?= $po['status'] ?></td>
            <td>
                <a href="/grn/create/<?= $po['id'] ?>" class="btn btn-primary btn-sm">Buat GRN</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
