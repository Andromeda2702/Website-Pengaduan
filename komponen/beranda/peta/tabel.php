<!DOCTYPE html>
<html lang="en">

    <?php
        $id = $_GET['id'];
    ?>

    <head>
        <title>Tabel Laporan</title>
        <link rel="stylesheet" href="../../../css/reset.css" type="text/css" />
        <link rel="stylesheet" href="../../../css/style.css" type="text/css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    </head>

    <body>

        <nav class="topnav" id="myTopnav">
            <a href="../index.php?id=<?php echo $id ?>#peta" class="active">Kembali</a>
            <a href="javascript:void(0);" class="icon" onclick="navBar()">
                <i class="fa fa-bars"></i>
            </a>
        </nav>

        <section>
            <div class="layout-tabel">
                <form action="tabel.php?id=<?php echo $id ?>" method="GET">
                    <input type="hidden" name="id" value="<?php echo $id ?>" />
                    <select style="margin-left: 3%; background-color: #1e2328; border-color: #1e2328;" class="selectTabel" name="filterKecamatan" onchange="this.form.submit()">
                        <option value="" disabled selected>--Select Kecamatan--</option>
                            <option value="Binawidya">Binawidya</option>
                            <option value="Bukit Raya">Bukit Raya</option>
                            <option value="Kulim">Kulim</option>
                            <option value="Lima Puluh">Lima Puluh</option>
                            <option value="Marpoyan Damai">Marpoyan Damai</option>
                            <option value="Payung Sekaki">Payung Sekaki</option>
                            <option value="Pekanbaru Kota">Pekanbaru Kota</option>
                            <option value="Rumbai Barat">Rumbai Barat</option>
                            <option value="Rumbai">Rumbai</option>
                            <option value="Rumbai Timur">Rumbai Timur</option>
                            <option value="Sail">Sail</option>
                            <option value="Senapelan">Senapelan</option>
                            <option value="Sukajadi">Sukajadi</option>
                            <option value="Tuah Madani">Tuah Madani</option>
                            <option value="Tenayan Raya">Tenayan Raya</option>
                    </select>
                    <a style="margin-left: 1%; text-decoration: none; color: salmon; letter-spacing: 1px; padding: 10px; background-color: #1e2328; border-radius: 5px;" href="tabel.php?id=<?php echo $id ?>">Clear</a>
                </from>
                <table style="width: 95%; margin-bottom: 20px; color: #f1f1f1;" class="table">
                    <tr>
                        <th>No</th>
                        <th>Kecamatan</th>
                        <th>Tgl Kejadian</th>
                        <th>Deskripsi</th>
                        <th>Foto</th>
                        <th>Action</th>
                    </tr>

                <?php
                    $conn = mysqli_connect('localhost','root','','kelompok');
                    
                    $no = 1;
                    if(isset($_GET['cari'])) {
                        $cari = $_GET['cari'];
                        $data = mysqli_query($conn, "select * from peta where kecamatan like '%".$cari."%'");
                    } else {
                        $data = mysqli_query($conn, "select * from peta");
                    }

                    if(isset($_GET["filterKecamatan"])){
                        $filterKecamatan=$_GET["filterKecamatan"];
                        $data = mysqli_query($conn, "select * from peta where kecamatan like '%".$filterKecamatan."%'");
                    }

                    $no = 1;

                    while($all = mysqli_fetch_array($data)) {
                ?>

                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $all['kecamatan'] ?></td>
                    <td><?php echo $all['tglkejadian'] ?></td>
                    <td><?php echo $all['deskripsi'] ?></td>
                    <td><img style="width: 150px; height: 150px;" src="../../../file/<?php echo $all['file'] ?>" /></td>
                    <td><a class="tombol" href="view.php?idLokasi=<?php echo $all['id'] ?>&id=<?php echo $id ?>">View Location</a></td>
                </tr>

                <?php
                    }
                ?>

                </table>
            </div>
        </section>

    </body>

</html>