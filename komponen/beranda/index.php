<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Layanan Pengaudan UPT Perpakiran</title>
        <link rel="stylesheet" href="../../css/reset.css" type="text/css" />
        <link rel="stylesheet" href="../../css/style.css" type="text/css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    </head>

    <body>

        <nav class="topnav" id="myTopnav">
            <a href="#tentangsaya" class="active">Tentang Saya</a>
            <a href="#peta">Peta</a>
            <a href="#kontak">Kontak</a>
            <a href="profile/profile.php?id=<?php echo $id = $_GET['id'] ;?>">Profile</a>
            <?php
                $conn = mysqli_connect('localhost','root','','kelompok');

                $id = $_GET['id'];

                $cekAkun = mysqli_query($conn, "select * from akun where id = $id");

                $dataAkun = mysqli_fetch_array($cekAkun);

                if($dataAkun['status']=='admin') {
                    echo("<a href='../admin/dashboard.php?id=$id'>Dashboard Admin</a>");
                }
            ?>
            <a href="javascript:void(0);" class="icon" onclick="navBar()">
                <i class="fa fa-bars"></i>
            </a>
        </nav>

        <section>
            <div id="beranda">
                <div class="kiriberanda">
                    <img src="../../img/logo-lpup.jpg" alt="Logo Dewa Perpus" />
                </div>
                <div class="kananberanda">
                    <div class="layoutKananBeranda">
                        <h2 class="animationTyping">Layanan Pengaudan UPT Perpakiran</h2>
                        <br/><br/>
                        <p>
                            Website kami menyediakan layanan untuk masyarakat mengadukan tentang juru parkir yang
                            ilegal yang dapat meresahkan masyarakat.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div id="tentangsaya">
                <div class="gambarTentangSaya">
                    <img src="../../img/023.jpg" alt="Gambar About" />
                </div>
                <div class="textTentangSaya">
                    <p>
                        Berdasarkan Perda No 1 tahun 2024 sudah diatur besaran tarif parkir
                        untuk kendaraan roda 2 sebesar Rp.2.000 dan kendaraan roda 4 Rp.3.000
                        dan Rp.10.000 untuk kendaraan roda 6 keatas.
                        <br/><br/>
                        Namun saat ini berdasarkan
                        yang terjadi di lapangan telah marak nya juru parkir liar yang tidak
                        sesuai dengan Perda No 1 Tahun 2024 yang terjadi di beberapa tempat,
                        maka dari itu kami membuat layanan pengaduan juru parkir yang ilegal
                        seara anonim. Yang dimana user akan di privasikan. Kami juga aktif
                        selama 24 jam, proses akan dilakukan dalam 1 jam terhitung dari
                        laporan masuk ke website kami.
                        <br/><br/>
                        Jika kedapatan juru parkir nya memungut biaya yang tidak sesuai dengan
                        perda maka akan kami kenakan pasal 368 ayat (1) KUHP, tindakan pemerasan
                        yang diancam akan mendapatkan pidana penjara paling lama sembilan tahun.
                    </p>
                </div>
            </div>
        </section>

        <section>
            <div id="peta">
                <div class="layout-peta">
                    <div class="layout-nav-peta">
                        <div class="kiri-nav-peta">
                            <a href="peta/input.php?id=<?php echo $id ?>">Input Laporan</a>
                        </div>
                        <div class="kanan-nav-peta">
                            <a href="peta/tabel.php?id=<?php echo $id ?>">Tabel Data Laporan</a>
                        </div>
                    </div>
                    <br/><br/><br/>
                    <div id="map" style="width: 80%; height: 500px; position: relative; top: 0%; left: 50%; transform: translate(-50%, -0%);"></div>
                </div>
            </div>
        </section>

        <section>
        <div id="kontak">
                <div class="kirikontak">
                    <img src="../../img/024.jpg" alt="Vector Kontak" />
                </div>
                <div class="kanankontak">
                    <div class="layoutform-kontak">
                        <form action="index.php?id=<?php echo $id ?>" method="POST" name="formInput">
                            <input type="text" name="nama" placeholder="Nama Anda..." />
                            <br/>
                            <input type="text" name="nowa" placeholder="Nomor WhatsApp..." />
                            <br/>
                            <textarea style="resize: none;" name="pesan" placeholder="Pesan..."></textarea>
                            <br/>
                            <input type="submit" name="kirim" value="Kirim Pesan" />
                        </form>

                        <?php
                            if(isset($_POST['kirim'])) {
                                $conn = mysqli_connect('localhost','root','','kelompok');

                                $idPesan = rand(1, 9999);

                                $namaUser = $_POST['nama'];
                                $nomorUser = $_POST['nowa'];
                                $messageUser = $_POST['pesan'];

                                if($namaUser == null) {
                                    echo "<script>alert('Nama tidak boleh kosong');</script>";
                                } else if($nomorUser == null) {
                                    echo "<script>alert('Nomor WhatsApp tidak boleh kosong');</script>";
                                } else if($messageUser == null) {
                                    echo "<script>alert('Pesan tidak boleh kosong');</script>";
                                } else {
                                    $sql = "INSERT INTO kontak values('$idPesan','$namaUser','$nomorUser','$messageUser')";

                                    $eksekusi = mysqli_query($conn, $sql);

                                    if($eksekusi) {
                                        echo "<script>alert('Pesan anda sudah dikirim ke admin, Terima Kasih :)');</script>";
                                    } else {
                                        echo "<script>alert('Pesan anda gagal dikirim, silahkan coba lagi dan pastikan internet anda lancar...');</script>";
                                    }
                                }
                            }
                        ?>

                        <br/><br/>
                        <ul>
                            <li><a href="#kontak" onclick="email()"><img src="../../img/gmail.png" alt="Sosmed Email" /></a></li>
                            <li><a href="http://wa.me/6285215636662" target="blank"><img src="../../img/whatsapp.png" alt="Sosmed WhatsApp" /></a></li>
                            <li><a href="https://github.com/Dewadsc" target="blank"><img src="../../img/github.png" alt="Sosmed Github" /></a></li>
                            <li><a href="https://discord.com/invite/DTSKbynb" target="blank"><img src="../../img/discord.png" alt="Sosmed Discord" /></a></li>
                            <li><a href="https://www.youtube.com/@dstartup9210" target="blank"><img src="../../img/youtube.png" alt="Sosmed YouTube" /></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </body>

    <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyA1MgLuZuyqR_OGY3ob3M52N46TDBRI_9k"></script>
    <script>
        function navBar() {
            var x = document.getElementById("myTopnav");
            if (x.className === "topnav") {
                x.className += " responsive";
            } else {
                x.className = "topnav";
            }
        }

        function initialize() {
            var propertiPeta = {
                center:new google.maps.LatLng(0.510651, 101.448908),
                zoom:11,
                mapTypeId:google.maps.MapTypeId.ROADMAP
            };
            
            var peta = new google.maps.Map(document.getElementById("map"), propertiPeta);

            <?php
                $conn = mysqli_connect('localhost','root','','kelompok');
                $data = mysqli_query($conn, "select * from peta");
                while ($peta = mysqli_fetch_array($data)) {
            ?>

			var lokasi<?php echo $peta['id'] ?> = new google.maps.Marker({
	          position: {
				          	lat: <?php echo $peta['latlokasi'] ?>, 
				          	lng: <?php echo $peta['longlokasi'] ?>
				          },
	          map: peta
	        });
		    
            <?php } ?>
        }

        google.maps.event.addDomListener(window, 'load', initialize);
    </script>

</html>