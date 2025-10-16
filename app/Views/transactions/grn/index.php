
<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<h1>Goods Receipts (GRN)</h1>

<?php if(session()->getFlashdata('success')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
<?php endif; ?>

<a href="grn/po_list" class="btn btn-primary mb-3">Buat GRN dari PO</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>GRN Number</th>
            <th>PO Number</th>
            <th>Status</th>
            <th>Approved By</th>
            <th>Created At</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($grns as $grn): ?>
        <tr>
            <td><?= $grn['id'] ?></td>
            <td><?= $grn['grn_number'] ?></td>
            <td><?= $grn['po_id'] ?></td>
            <td><?= $grn['status'] ?></td>
            <td><?= isset($grn['approved_by']) ? ($userMap[$grn['approved_by']] ?? '-') : '-' ?></td>
            <td><?= $grn['created_at'] ?></td>
            <td>
                <?php if($grn['status'] == 'Pending'): ?>
                    <form action="/grn/<?= $grn['id'] ?>/approve" method="post" style="display:inline">
                        <?= csrf_field() ?>
                        <input type="hidden" name="_method" value="PUT">
                        <button class="btn btn-success btn-sm">Approve</button>
                    </form>
                    <form action="/grn/<?= $grn['id'] ?>/reject" method="post" style="display:inline">
                        <?= csrf_field() ?>
                        <input type="hidden" name="_method" value="PUT">
                        <button class="btn btn-danger btn-sm">Reject</button>
                    </form>
                <?php else: ?>
                    <span>-</span>
                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->endSection() ?>