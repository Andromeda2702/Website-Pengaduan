<?php
    $id = $_GET['id'];
    $idLokasi = $_GET['idLokasi'];

    $conn = mysqli_connect('localhost','root','','kelompok');

    $result = mysqli_query($conn, "select * from peta where id = '$idLokasi'");

    if(mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_array($result);

        if($data['status']=='Belum') {
            $eksekusiTanggap = mysqli_query($conn, "update peta set status = 'Ditanggapi' where id = $idLokasi");

            if($eksekusiTanggap) {
                echo("<script>alert('Berhasil mengubah status menjadi Ditanggapi'); window.location.href='../../laporan.php?id=$id';</script>");
            } else {
                echo("<script>alert('Gagal mengubah status menjadi Ditanggapi'); window.location.href='../../laporan.php?id=$id';</script>");
            }
        } else {
            echo("<script>alert('Data sudah ditanggapi sebelumnya'); window.location.href='../../laporan.php?id=$id';</script>");
        }
    } else {
        echo "<script>alert('Data tidak ditemukan');</script>";
    }
?>