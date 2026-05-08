<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Data Mahasiswa Teknik Informatika UMMI</h2>
    <div style="text-align: center; margin-bottom: 20px;">
        <a href="form.php" class="btn btn-tambah">Tambah Mahasiswa Baru</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>Foto</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Jurusan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = mysqli_query($conn, "SELECT * FROM mahasiswa ORDER BY id DESC");
            while($row = mysqli_fetch_assoc($query)) {
            ?>
            <tr>
                <td>
                    <?php if($row['foto']): ?>
                        <img src="uploads/<?php echo $row['foto']; ?>" width="50" height="50" style="object-fit: cover;">
                    <?php else: ?>
                        <small>No Photo</small>
                    <?php endif; ?>
                </td>
                <td><?php echo $row['nim']; ?></td>
                <td><?php echo $row['nama']; ?></td>
                <td><?php echo $row['jurusan']; ?></td>
                <td>
                    <a href="form.php?id=<?php echo $row['id']; ?>" class="btn btn-edit">Edit</a>
                    <a href="proses.php?hapus=<?php echo $row['id']; ?>" class="btn btn-hapus" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>