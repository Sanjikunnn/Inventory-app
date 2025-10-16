<h2>Data Customer</h2>

<?php if(session()->getFlashdata('success')): ?>
    <div style="color:green;"><?= session()->getFlashdata('success') ?></div>
<?php endif; ?>

<a href="<?= base_url('customers/create') ?>">Tambah Customer</a>

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
    <?php $no=1; foreach($customers as $customer): ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $customer['name'] ?></td>
        <td><?= $customer['contact'] ?></td>
        <td><?= $customer['address'] ?></td>
        <td><?= $customer['phone'] ?></td>
        <td><?= $customer['email'] ?></td>
        <td>
            <a href="<?= base_url('customers/edit/'.$customer['id']) ?>">Edit</a> |
            <a href="<?= base_url('customers/delete/'.$customer['id']) ?>" onclick="return confirm('Hapus customer ini?')">Hapus</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
