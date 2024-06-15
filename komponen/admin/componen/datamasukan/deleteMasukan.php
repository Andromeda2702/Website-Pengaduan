<?php
    $id = $_GET['id'];
    $idMasukan = $_GET['idMasukan'];
    $cekKepastian = $_GET['cek'];

    if($cekKepastian=="0") {
        echo("
            <script>
                if (confirm('Apakah anda ingin menghapus data masukan ini?')) {
                    window.location.href='deleteMasukan.php?id=$id&idMasukan=$idMasukan&cek=1';
                } else {
                    window.location.href='masukan.php?id=$id';
                }
            </script>
        ");
    } else {
        $conn = mysqli_connect('localhost','root','','kelompok');

        $eksekusiDelete = mysqli_query($conn, "delete from kontak where id = $idMasukan");

        if($eksekusiDelete) {
            echo("<script>alert('Berhasil hapus data masukan'); window.location.href='masukan.php?id=$id';</script>");
        } else {
            echo("<script>alert('Gagal hapus data'); window.location.href='masukan.php?id=$id';</script>");
        }
    }
?>