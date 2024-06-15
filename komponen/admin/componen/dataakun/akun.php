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
                <div class="layout-filter-admin" style="text-align: center;">
                    <form action="akun.php?id=<?php echo $id ?>" method="GET">
                        <select class="selectTabel" name="filterStatus" onchange="this.form.submit()">
                            <option value="" disabled selected>--Select Status--</option>
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>
                        <input type="search" name="cari" placeholder="Masukkan Email" />
                        <input type="submit" value="Search">
                        <input type="hidden" name="id" value="<?php echo $id ?>" />
                        <a href="akun.php?id=<?php echo $id ?>">Clear</a>
                    </from>
                </div>
                <table style="width: 95%; margin-bottom: 20px; color: #f1f1f1;" class="table">
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Status</th>
                        <th>Gender</th>
                    </tr>

                <?php
                    $conn = mysqli_connect('localhost','root','','kelompok');
                    
                    $no = 1;
                    if(isset($_GET['cari'])) {
                        $cari = $_GET['cari'];
                        $data = mysqli_query($conn, "select * from akun where email like '%".$cari."%'");
                    } else {
                        $data = mysqli_query($conn, "select * from akun");
                    }

                    if(isset($_GET["filterStatus"])){
                        $filterStatus=$_GET["filterStatus"];
                        $data = mysqli_query($conn, "select * from akun where status like '%".$filterStatus."%'");
                    }

                    $no = 1;

                    while($all = mysqli_fetch_array($data)) {
                ?>

                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $all['username'] ?></td>
                    <td><?php echo $all['email'] ?></td>
                    <td><?php echo $all['phone'] ?></td>
                    <td><?php echo $all['status'] ?></td>
                    <td><?php echo $all['gender'] ?></td>
                </tr>

                <?php
                    }
                ?>

                </table>
            </div>
        </section>

    </body>

</html>