<!DOCTYPE html>
<html lang="en">

<?php
    $id = $_GET['id'];
?>

<head>
    <title>Input Laporan</title>
    <link rel="stylesheet" href="../../../css/reset.css" type="text/css" />
    <link rel="stylesheet" href="../../../css/style.css" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>

<body onload="initializeMap()">

    <nav class="topnav" id="myTopnav">
        <a href="../index.php?id=<?php echo $id ?>#peta" class="active">Kembali</a>
        <a href="javascript:void(0);" class="icon" onclick="navBar()">
            <i class="fa fa-bars"></i>
        </a>
    </nav>

    <section>
        <div id="layout-form-input">
            <div class="layout-peta-form">
                <div id="kanvaspeta" style="width:80%; height:500px; position: relative; top: 0%; left: 50%; transform: translate(-50%, -0%); border-radius: 10px;"></div>
                <br/><br/>
                <form action="input.php?id=<?php echo $id ?>" enctype="multipart/form-data" name="formInput" method="post">
                    <input type="text" name="latlokasi" id="koorX" readonly="readonly" placeholder="Lat Location" />
                    <br/>
                    <input type="text" name="longlokasi" id="koorY" readonly="readonly" placeholder="Long Location" />
                    <br/>
                    <input type="date" name="tglkejadian" />
                    <br/>
                    <select name="kecamatan" style="background-color: #000; width: 450px; border-color: #000;">
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
                    <br/>
                    <input type="file" name="file" />
                    <br/>
                    <textarea name="deskripsi" placeholder="Deskripsi Kejadian" style="resize: none; height: 250px;"></textarea>
                    <br/><br/>
                    <input type="hidden" name="month" id="month" />
                    <input type="submit" name="submit" value="Kirim Laporan">
                </form>
            </div>
        </div>
    </section>

        <?php
            if(isset($_POST['submit'])) {
                $conn = mysqli_connect('localhost','root','','kelompok');

                $ekstensiYangBoleh = array('png','jpg','gif','ico','jpeg');
                $namaFile = $_FILES['file']['name'];
                $ex = explode('.', $namaFile);
                $ekstensi = strtolower(end($ex));
                $ukuran = $_FILES['file']['size'];
                $namaFileBaru = uniqid();
                $namaFileBaru .= '.';
                $namaFileBaru .= $ekstensi;
                $fileTemp = $_FILES['file']['tmp_name'];

                if(in_array($ekstensi, $ekstensiYangBoleh) == true) {
                    if($ukuran < 1044070) {
                        move_uploaded_file($fileTemp, '../../../file/' .$namaFileBaru);
                    } else {
                        echo "Ukuran file terlalu besar, minimal 1 mb bro ";
                    }
                } else {
                    echo "Ekstensi file tidak boleh bro";
                }
            }
        ?>

        <?php
            if(isset($_POST['submit'])) {
                $conn = mysqli_connect('localhost','root','','kelompok');

                $id = rand(1, 9999);
                $kecamatan = $_POST['kecamatan'];
                $tglkejadian = $_POST['tglkejadian'];
                $deskripsi = $_POST['deskripsi'];
                $latlokasi = $_POST['latlokasi'];
                $longlokasi = $_POST['longlokasi'];
                $month = $_POST['month'];
                $status = "Belum";
                $idPelapor = $_GET['id'];

                if($kecamatan==null) {
                    echo("<script>alert('Kecamatan tidak boleh kosong');</script>");
                } else if($deskripsi==null) {
                    echo("<script>alert('Deskripsi tidak boleh kosong');</script>");
                } else if($latlokasi==null) {
                    echo("<script>alert('Lat Lokasi tidak boleh kosong');</script>");
                } else if($longlokasi==null) {
                    echo("<script>alert('Long Lokasi tidak boleh kosong');</script>");
                } else {
                    $sql = "insert into peta values('$id','$kecamatan','$tglkejadian','$deskripsi','$latlokasi','$longlokasi','$status','$idPelapor','$month','$namaFileBaru')";
                    $eksekusi = mysqli_query($conn, $sql);

                    if($eksekusi) {
                        echo "<script>alert('Laporan terkirim, terima kasih sudah melaporkan kepada kami');</script>";
                    } else {
                        echo "<script>alert('Laporan gagal terkirim, silahkan anda coba lagi');</script>";
                    }
                }
            }
        ?>

    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCns0o8yq9Q6Z3sskLNzV6hfaPilFI5twU&callback=initMap"></script>
    <script type="text/javascript" src="../../../jquery.js"></script>
    <script type="text/javascript">
        var peta;
        var koorAwal = new google.maps.LatLng(0.023910, 113.576283);

        const monthNames = [
            "January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"
        ];

        const currentDate = new Date();
        const currentMonth = monthNames[currentDate.getMonth()]
        document.getElementById('month').value = currentMonth;

        function initializeMap() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition, showError);
            } else {
                alert("Lokasi tidak terbaca, silahkan cek koneksi anda");
                loadMap(koorAwal);
            }
        }

        function showPosition(position) {
            var userLocation = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
            loadMap(userLocation);
            $("#koorX").val(position.coords.latitude);
            $("#koorY").val(position.coords.longitude);
        }

        function showError(error) {
            switch(error.code) {
                case error.PERMISSION_DENIED:
                    alert("User denied the request for Geolocation.");
                    break;
                case error.POSITION_UNAVAILABLE:
                    alert("Location information is unavailable.");
                    break;
                case error.TIMEOUT:
                    alert("The request to get user location timed out.");
                    break;
                case error.UNKNOWN_ERROR:
                    alert("An unknown error occurred.");
                    break;
            }
            loadMap(koorAwal);
        }

        function loadMap(location) {
            var mapOptions = {
                zoom: 15,
                center: location,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            peta = new google.maps.Map(document.getElementById("kanvaspeta"), mapOptions);
            var marker = new google.maps.Marker({
                position: location,
                map: peta
            });

            google.maps.event.addListener(peta, 'click', function(event) {
                tandai(event.latLng);
            });
        }

        function tandai(lokasi) {
            $("#koorX").val(lokasi.lat());
            $("#koorY").val(lokasi.lng());
            var marker = new google.maps.Marker({
                position: lokasi,
                map: peta
            });
        }

        function loadDataLokasiTersimpan() {
            $('#kordinattersimpan').load('tampilkan_lokasi_tersimpan.php');
        }

        setInterval(loadDataLokasiTersimpan, 3000);

        function navBar() {
            var x = document.getElementById("myTopnav");
            if (x.className === "topnav") {
                x.className += " responsive";
            } else {
                x.className = "topnav";
            }
        }
    </script>

</body>
</html>