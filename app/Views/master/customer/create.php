<h2>Tambah Customer</h2>

<form action="<?= base_url('customers/store') ?>" method="post">
    <label>Nama</label><br>
    <input type="text" name="name" required><br>

    <label>Contact</label><br>
    <input type="text" name="contact"><br>

    <label>Alamat</label><br>
    <textarea name="address"></textarea><br>

    <label>Telepon</label><br>
    <input type="text" name="phone"><br>

    <label>Email</label><br>
    <input type="email" name="email"><br><br>

    <button type="submit">Simpan</button>
</form>
