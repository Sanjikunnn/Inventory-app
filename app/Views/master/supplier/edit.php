<h2>Edit Supplier</h2>

<form action="<?= base_url('suppliers/update/'.$supplier['id']) ?>" method="post">
    <label>Nama</label><br>
    <input type="text" name="name" value="<?= $supplier['name'] ?>" required><br>

    <label>Contact</label><br>
    <input type="text" name="contact" value="<?= $supplier['contact'] ?>"><br>

    <label>Alamat</label><br>
    <textarea name="address"><?= $supplier['address'] ?></textarea><br>

    <label>Telepon</label><br>
    <input type="text" name="phone" value="<?= $supplier['phone'] ?>"><br>

    <label>Email</label><br>
    <input type="email" name="email" value="<?= $supplier['email'] ?>"><br><br>

    <button type="submit">Update</button>
</form>
