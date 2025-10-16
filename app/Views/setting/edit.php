<h2>Edit User</h2>

<form action="<?= base_url('setting/update/' . $user['id']) ?>" method="post">
    <label>Username</label><br>
    <input type="text" name="username" value="<?= $user['username'] ?>" required><br><br>

    <label>Password (kosongkan jika tidak ingin diubah)</label><br>
    <input type="password" name="password"><br><br>

    <label>Nama</label><br>
    <input type="text" name="name" value="<?= $user['name'] ?>" required><br><br>

    <label>Role</label><br>
    <select name="role" required>
        <option value="admin" <?= $user['role']=='admin' ? 'selected' : '' ?>>Admin</option>
        <option value="manager" <?= $user['role']=='manager' ? 'selected' : '' ?>>Manager</option>
        <option value="staff" <?= $user['role']=='staff' ? 'selected' : '' ?>>Staff</option>
    </select><br><br>

    <label>Email</label><br>
    <input type="email" name="email" value="<?= $user['email'] ?>"><br><br>

    <button type="submit">Update</button>
</form>
