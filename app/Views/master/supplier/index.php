<h2>Data Supplier</h2>

<a href="<?= base_url('suppliers/create') ?>">Tambah Supplier</a>

<?php if(session()->getFlashdata('success')): ?>
    <p><?= session()->getFlashdata('success') ?></p>
<?php endif; ?>

<table border="1" cellpadding="5">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Contact</th>
        <th>Alamat</th>
        <th>Telepon</th>
        <th>Email</th>
        <th>Aksi</th>
    </tr>
    <?php $no=1; foreach($suppliers as $supplier): ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $supplier['name'] ?></td>
        <td><?= $supplier['contact'] ?></td>
        <td><?= $supplier['address'] ?></td>
        <td><?= $supplier['phone'] ?></td>
        <td><?= $supplier['email'] ?></td>
        <td>
            <a href="<?= base_url('suppliers/edit/'.$supplier['id']) ?>">Edit</a> |
            <a href="<?= base_url('suppliers/delete/'.$supplier['id']) ?>" onclick="return confirm('Hapus supplier ini?')">Hapus</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>


