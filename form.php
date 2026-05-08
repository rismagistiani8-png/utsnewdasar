<?php
include 'koneksi.php';
$id = isset($_GET['id']) ? $_GET['id'] : '';
$data = ['nim' => '', 'nama' => '', 'jurusan' => '', 'foto' => ''];

if ($id) {
    $query = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE id = '$id'");
    $data = mysqli_fetch_assoc($query);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Form <?php echo $id ? 'Edit' : 'Tambah'; ?> Mahasiswa</h2>
    
    <form action="proses.php" method="POST" enctype="multipart/form-data" onsubmit="return validasi()">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        
        <label>NIM:</label>
        <input type="text" name="nim" id="nim" value="<?php echo $data['nim']; ?>">
        
        <label>Nama Lengkap:</label>
        <input type="text" name="nama" id="nama" value="<?php echo $data['nama']; ?>">
        
        <label>Jurusan:</label>
        <input type="text" name="jurusan" id="jurusan" value="<?php echo $data['jurusan']; ?>">
        
        <label>Foto Profil:</label>
        <?php if($id && $data['foto']): ?>
            <img src="uploads/<?php echo $data['foto']; ?>" width="80" style="margin-bottom: 10px;"><br>
        <?php endif; ?>
        <input type="file" name="foto" id="foto">
        
        <button type="submit" name="simpan">Simpan Data</button>
        <div style="text-align: center; margin-top: 15px;">
            <a href="index.php">Kembali ke Daftar</a>
        </div>
    </form>

    <script>
    function validasi() {
        const nim = document.getElementById('nim').value;
        const foto = document.getElementById('foto');
        
        if (nim.trim() === "") {
            alert("NIM tidak boleh kosong!");
            return false;
        }

        if (foto.files.length > 0) {
            const file = foto.files[0];
            const fileSize = file.size / 1024 / 1024; 
            const fileType = file.type;

            if (!['image/jpeg', 'image/jpg', 'image/png'].includes(fileType)) {
                alert("Hanya file JPG, JPEG, atau PNG yang diizinkan!");
                return false;
            }
            if (fileSize > 2) {
                alert("Ukuran file maksimal 2 MB!");
                return false;
            }
        }
        return true;
    }
    </script>
</body>
</html>