<!DOCTYPE html>
<html lang="en">

    <?php
        $id = $_GET['id'];
        $idLokasi = $_GET['idLokasi'];
    ?>

    <head>
        <title>View Location</title>
        <link rel="stylesheet" href="../../../../../../css/reset.css" type="text/css" />
        <link rel="stylesheet" href="../../../../../../css/style.css" type="text/css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    </head>

    <body>

        <nav class="topnav" id="myTopnav">
            <a href="../../laporan.php?id=<?php echo $id ?>" class="active">Kembali</a>
            <a href="javascript:void(0);" class="icon" onclick="navBar()">
                <i class="fa fa-bars"></i>
            </a>
        </nav>

        <section>
            <div id="map" style="width: 80%; height: 500px;"></div>
        </section>

    </body>

    <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyA1MgLuZuyqR_OGY3ob3M52N46TDBRI_9k"></script>
    <script type="text/javascript">
        const scrollIcon = document.querySelector(".scroll-box");
        let showTimeOut = null;

        window.addEventListener("scroll", function () {
            hideScrollIcon();

            if (showTimeOut !== null) {
                clearTimeout(showTimeOut);
            }

            showTimeOut = setTimeout(showScrollIcon, 100);
        });

        function reveal() {
            var reveals = document.querySelectorAll(".reveal");

            for (var i = 0; i < reveals.length; i++) {
                var windowHeight = window.innerHeight;
                var elementTop = reveals[i].getBoundingClientRect().top;
                var elementVisible = 150;

                if (elementTop < windowHeight - elementVisible) {
                    reveals[i].classList.add("active");
                } else {
                    reveals[i].classList.remove("active");
                }
            }
        }

        window.addEventListener("scroll", reveal);

        function initialize() {
            <?php
                $conn = mysqli_connect('localhost','root','','kelompok');
                $data = mysqli_query($conn, "select * from peta where id = $idLokasi");
                while ($peta = mysqli_fetch_array($data)) {
            ?>

            var propertiPeta = {
                center:new google.maps.LatLng(<?php echo $peta['latlokasi'] ?>, <?php echo $peta['longlokasi'] ?>),
                zoom:20,
                mapTypeId:google.maps.MapTypeId.ROADMAP
            };
            
            var peta = new google.maps.Map(document.getElementById("map"), propertiPeta);

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