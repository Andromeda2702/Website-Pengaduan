<!DOCTYPE html>
<html lang="en">

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sign In</title>
        <link rel="stylesheet" href="css/reset.css" type="text/css" />
        <link rel="stylesheet" href="css/style.css" type="text/css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    </head>

    <body>

        <div class="container-login" style="height: 100vh;">
            <div class="layout-login">
                <h2>Sign In</h2>
                <form action="index.php" method="post" name="formLogin">
                    <input type="email" name="email" placeholder="Masukkan Email" />
                    <br/>
                    <input type="password" name="password" placeholder="Masukkan Password" />
                    <br/>
                    <input type="submit" name="submit" value="Masuk" />
                </form>
                <br/>
                <a href="signup.php">Sign Up</a>
            </div>
        </div>

        <?php
            $conn = mysqli_connect('localhost','root','','kelompok');
        
            $email = $_POST['email'];
            $password = $_POST['password'];

            if($email==null) {
                echo "<script>alert('Email tidak boleh kosong');</script>";
            } else if($password==null) {
                echo "<script>alert('Password tidak boleh kosong');</script>";
            } else {
                $result = mysqli_query($conn, "select * from akun where email = '$email' and password = '$password'");

                if(mysqli_num_rows($result) > 0) {
                    $data = mysqli_fetch_array($result);
                    $id = $data['id'];
                    header("Location:komponen/beranda/index.php?id=$id");
                } else {
                    echo "<script>alert('Email & Password Salah');</script>";
                }
            }
        ?>

    </body>

</html>