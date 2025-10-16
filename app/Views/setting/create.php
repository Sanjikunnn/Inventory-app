<h2>Tambah User Baru</h2>

<form action="/setting/store" method="post">
    <label>Username</label><br>
    <input type="text" name="username" required><br><br>

    <label>Password</label><br>
    <input type="password" name="password" required><br><br>

    <label>Nama</label><br>
    <input type="text" name="name" required><br><br>

    <label>Role</label><br>
    <select name="role" required>
        <option value="admin">Admin</option>
        <option value="manager">Manager</option>
        <option value="staff">Staff</option>
    </select><br><br>

    <label>Email</label><br>
    <input type="email" name="email"><br><br>

    <button type="submit">Simpan</button>
</form>
