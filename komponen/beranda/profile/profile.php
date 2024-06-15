<!DOCTYPE html>
<html lang="en">

    <?php
        $id = $_GET['id'];
    ?>

    <head>
        <title>Profile</title>
        <link rel="stylesheet" href="../../../css/reset.css" type="text/css" />
        <link rel="stylesheet" href="../../../css/style.css" type="text/css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    </head>

    <body>

        <nav class="topnav" id="myTopnav">
            <a href="../index.php?id=<?php echo $id ?>" class="active">Kembali</a>
            <a href="javascript:void(0);" class="icon" onclick="navBar()">
                <i class="fa fa-bars"></i>
            </a>
        </nav>

        <section>
            <div class="layout-profile">
                <div class="item-profile">
                    <h3 style="letter-spacing: 1px; color: salmon; font-weight: bold; font-size: 35px; text-align: center; margin-bottom: 1%;">MY PROFILE</h3>
                    <br/><br/>
                    <?php
                        $conn = mysqli_connect('localhost','root','','kelompok');

                        $data = mysqli_query($conn, "select * from akun where id = $id");

                        $all = mysqli_fetch_array($data);
                    ?>
                    <div class="kiri-profile">
                        <h2>Email</h2>
                        <div class="layout-item-profile">
                            <input type="text" value="<?php echo $all['email'] ?>" disabled>
                        </div>
                        <br/>
                        <h2>Password</h2>
                        <div class="layout-item-profile">
                            <input type="password" value="<?php echo $all['password'] ?>" disabled>
                        </div>
                        <br/>
                        <h2>Username</h2>
                        <div class="layout-item-profile">
                            <input type="text" value="<?php echo $all['username'] ?>" disabled>
                        </div>
                    </div>
                    <div class="kanan-profile">
                        <h2>Phone</h2>
                        <div class="layout-item-profile">
                            <input type="text" value="<?php echo $all['phone'] ?>" disabled>
                        </div>
                        <br/>
                        <h2>Gender</h2>
                        <div class="layout-item-profile">
                            <input type="text" value="<?php echo $all['gender'] ?>" disabled>
                        </div>
                        <br/>
                        <h2>Status</h2>
                        <div class="layout-item-profile">
                            <input type="text" value="<?php echo $all['status'] ?>" disabled>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </body>

</html>