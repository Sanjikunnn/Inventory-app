<h2>Daftar User</h2>
<?php if(session()->getFlashdata('success')): ?>
    <div style="color:green;"><?= session()->getFlashdata('success') ?></div>
<?php endif; ?>

<a href="setting/create">Tambah User</a>

<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Nama</th>
        <th>Role</th>
        <th>Email</th>
        <th>Aksi</th>
    </tr>
    <?php foreach($users as $u): ?>
    <tr>
        <td><?= $u['id'] ?></td>
        <td><?= $u['username'] ?></td>
        <td><?= $u['name'] ?></td>
        <td><?= $u['role'] ?></td>
        <td><?= $u['email'] ?></td>
        <td>
            <a href="setting/edit/<?= $u['id'] ?>">Edit</a> |
            <a href="setting/delete/<?= $u['id'] ?>" onclick="return confirm('Yakin mau dihapus?')">Hapus</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

