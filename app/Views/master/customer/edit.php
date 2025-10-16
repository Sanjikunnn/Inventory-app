<h2>Edit Customer</h2>

<form action="<?= base_url('customers/update/'.$customer['id']) ?>" method="post">
    <label>Nama</label><br>
    <input type="text" name="name" value="<?= $customer['name'] ?>" required><br>

    <label>Contact</label><br>
    <input type="text" name="contact" value="<?= $customer['contact'] ?>"><br>

    <label>Alamat</label><br>
    <textarea name="address"><?= $customer['address'] ?></textarea><br>

    <label>Telepon</label><br>
    <input type="text" name="phone" value="<?= $customer['phone'] ?>"><br>

    <label>Email</label><br>
    <input type="email" name="email" value="<?= $customer['email'] ?>"><br><br>

    <button type="submit">Update</button>
</form>
