<h2>Purchase Orders</h2>
<a href="/po/create">Buat PO Baru</a>
<table>
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
            <td><?= $po['total_amount'] ?></td>
            <td><?= $po['status'] ?></td>
            <td>
                <?php if($po['status'] == 'Pending' && session()->get('role') != 'Staff'): ?>
                    <form method="post" action="/po/<?= $po['id'] ?>/approve"><input type="hidden" name="_method" value="PUT"><button>Approve</button></form>
                    <form method="post" action="/po/<?= $po['id'] ?>/reject"><input type="hidden" name="_method" value="PUT"><button>Reject</button></form>
                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
