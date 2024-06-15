<!DOCTYPE html>
<html lang="en">

    <?php
        $id = $_GET['id'];
    ?>

    <head>
        <title>Dashboard Admin</title>
        <link rel="stylesheet" href="../../css/reset.css" type="text/css" />
        <link rel="stylesheet" href="../../css/style.css" type="text/css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    </head>

    <body>

        <section>
            <div class="layout-submenu-admin">
                <div class="item-btn-submenu">
                    <div class="kiri-submenu">
                        <button onclick="beranda()">Kembali</button><br/>
                        <button onclick="akun()">Data Akun</button>
                    </div>
                    <div class="kanan-submenu">
                        <button onclick="laporan()">Data Laporan</button><br/>
                        <button onclick="masukan()">Data Masukan</button>
                    </div>
                </div>
            </div>
        </section>

    </body>

    <script>
        function beranda() {
            window.location.href="../beranda/index.php?id=<?php echo $id ?>";
        }

        function akun() {
            window.location.href="componen/dataakun/akun.php?id=<?php echo $id ?>";
        }

        function laporan() {
            window.location.href="componen/datalaporan/laporan.php?id=<?php echo $id ?>";
        }

        function masukan() {
            window.location.href="componen/datamasukan/masukan.php?id=<?php echo $id ?>";
        }
    </script>

</html>