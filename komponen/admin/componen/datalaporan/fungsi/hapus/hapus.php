<?php
    $id = $_GET['id'];
    $idLaporan = $_GET['idLaporan'];
    $cekKepastian = $_GET['cek'];

    if($cekKepastian=="0") {
        echo("
            <script>
                if (confirm('Apakah anda ingin menghapus data masukan ini?')) {
                    window.location.href='hapus.php?id=$id&idLaporan=$idLaporan&cek=1';
                } else {
                    window.location.href='../../laporan.php?id=$id';
                }
            </script>
        ");
    } else {
        $conn = mysqli_connect('localhost','root','','kelompok');

        $eksekusiDelete = mysqli_query($conn, "delete from peta where id = $idLaporan");

        if($eksekusiDelete) {
            echo("<script>alert('Berhasil Laporan data masukan'); window.location.href='../../laporan.php?id=$id';</script>");
        } else {
            echo("<script>alert('Gagal hapus data'); window.location.href='../../laporan.php?id=$id';</script>");
        }
    }
?>