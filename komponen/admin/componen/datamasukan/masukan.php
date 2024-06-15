<!DOCTYPE html>
<html lang="en">

    <?php
        $id = $_GET['id'];
    ?>

    <head>
        <title>Tabel Laporan</title>
        <link rel="stylesheet" href="../../../../css/reset.css" type="text/css" />
        <link rel="stylesheet" href="../../../../css/style.css" type="text/css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    </head>

    <body>

        <nav class="topnav" id="myTopnav">
            <a href="../../dashboard.php?id=<?php echo $id ?>" class="active">Kembali</a>
            <a href="javascript:void(0);" class="icon" onclick="navBar()">
                <i class="fa fa-bars"></i>
            </a>
        </nav>

        <section>
            <div class="layout-tabel">
                <table style="width: 95%; margin-bottom: 20px; color: #f1f1f1;" class="table">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Phone Number</th>
                        <th>Pesan</th>
                        <th>Action</th>
                    </tr>

                <?php
                    $conn = mysqli_connect('localhost','root','','kelompok');
                    
                    $no = 1;
                    $data = mysqli_query($conn, "select * from kontak");

                    while($all = mysqli_fetch_array($data)) {
                ?>

                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $all['nama'] ?></td>
                    <td><?php echo $all['nowa'] ?></td>
                    <td><?php echo $all['pesan'] ?></td>
                    <td><a class="tombol" href="deleteMasukan.php?id=<?php echo $id ?>&idMasukan=<?php echo $all['id'] ?>&cek=0">Hapus Data</a></td>
                </tr>

                <?php
                    }
                ?>

                </table>
            </div>
        </section>

    </body>

</html>