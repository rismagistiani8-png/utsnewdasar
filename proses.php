<?php
include 'koneksi.php';

if (isset($_POST['simpan'])) {
    $id      = $_POST['id'];
    $nim     = mysqli_real_escape_string($conn, $_POST['nim']);
    $nama    = mysqli_real_escape_string($conn, $_POST['nama']);
    $jurusan = mysqli_real_escape_string($conn, $_POST['jurusan']);
    
    $foto_name = $_FILES['foto']['name'];
    $tmp_name  = $_FILES['foto']['tmp_name'];

    if ($id == "") { 
        // TAMBAH DATA
        $nama_baru = "";
        if ($foto_name != "") {
            $nama_baru = time() . "_" . $foto_name;
            move_uploaded_file($tmp_name, 'uploads/' . $nama_baru);
        }
        mysqli_query($conn, "INSERT INTO mahasiswa (nim, nama, jurusan, foto) VALUES ('$nim', '$nama', '$jurusan', '$nama_baru')");
    } else { 
        // EDIT DATA
        if ($foto_name != "") {
            $nama_baru = time() . "_" . $foto_name;
            move_uploaded_file($tmp_name, 'uploads/' . $nama_baru);
            mysqli_query($conn, "UPDATE mahasiswa SET nim='$nim', nama='$nama', jurusan='$jurusan', foto='$nama_baru' WHERE id='$id'");
        } else {
            mysqli_query($conn, "UPDATE mahasiswa SET nim='$nim', nama='$nama', jurusan='$jurusan' WHERE id='$id'");
        }
    }
    header("location:index.php");
}

if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    // Hapus foto dari folder sebelum hapus data di DB (opsional tapi bagus)
    $res = mysqli_query($conn, "SELECT foto FROM mahasiswa WHERE id='$id'");
    $row = mysqli_fetch_assoc($res);
    if($row['foto'] != "") { unlink("uploads/".$row['foto']); }

    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id='$id'");
    header("location:index.php");
}
?>