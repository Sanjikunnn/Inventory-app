<h2>Daftar Item</h2>
<?php if(session()->getFlashdata('success')): ?>
    <div style="color:green;"><?= session()->getFlashdata('success') ?></div>
<?php endif; ?>

<a href="/items/create">Tambah Item</a>
<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>SKU</th>
        <th>Name</th>
        <th>Unit</th>
        <th>Price</th>
        <th>Min Stock</th>
        <th>Aksi</th>
    </tr>
    <?php foreach($items as $item): ?>
    <tr>
        <td><?= $item['id'] ?></td>
        <td><?= $item['sku'] ?></td>
        <td><?= $item['name'] ?></td>
        <td><?= $item['unit'] ?></td>
        <td><?= number_format($item['price'], 2) ?></td>
        <td><?= $item['min_stock'] ?></td>
        <td>
            <a href="/items/edit/<?= $item['id'] ?>">Edit</a>
            <a href="/items/delete/<?= $item['id'] ?>" onclick="return confirm('Yakin?')">Hapus</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
