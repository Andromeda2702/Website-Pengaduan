<!DOCTYPE html>
<html lang="en">

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sign Up</title>
        <link rel="stylesheet" href="css/reset.css" type="text/css" />
        <link rel="stylesheet" href="css/style.css" type="text/css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    </head>

    <body>

        <div class="container-login" style="height: 100vh;">
            <div class="layout-login">
                <h2>Sign Up</h2>
                <form action="signup.php" method="post" name="formLogin">
                    <input type="email" name="email" placeholder="Masukkan Email" />
                    <br/>
                    <input type="password" name="password" placeholder="Masukkan Password" />
                    <br/>
                    <input type="text" name="username" placeholder="Masukkan Username" />
                    <br/>
                    <input type="text" name="phone" placeholder="Masukkan Phone Number" />
                    <br/>
                    <select name="gender" style="background-color: #2a2e34; width: 320px;">
                        <option value="" disabled selected>--Select Gender--</option>
                        <option value="Laki Laki">Laki Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                    <br/>
                    <input type="submit" name="submit" value="Create" />
                </form>
                <br/>
                <a href="index.php">Kembali</a>
            </div>
        </div>

        <?php
            if(isset($_POST['submit'])) {
                $conn = mysqli_connect('localhost','root','','kelompok');

                $id = rand(1, 9999);
                $email = $_POST['email'];
                $password = $_POST['password'];
                $username = $_POST['username'];
                $phone = $_POST['phone'];
                $gender = $_POST['gender'];
                $status = 'user';

                if($email==null) {
                    echo "<script>alert('Email tidak boleh kosong');</script>";
                } else if($password==null) {
                    echo "<script>alert('Password tidak boleh kosong');</script>";
                } else if($username==null) {
                    echo "<script>alert('Username tidak boleh kosong');</script>";
                } else if($phone==null) {
                    echo "<script>alert('Phone tidak boleh kosong');</script>";
                } else if($gender==null) {
                    echo "<script>alert('Gender tidak boleh kosong');</script>";
                } else {
                    $sql = "insert into akun values('$id','$email','$password','$username','$phone','$gender','$status')";
                    $eksekusi = mysqli_query($conn, $sql);

                    if($eksekusi) {
                        echo "<script>alert('Akun berhasil dibuat, silahkan kembali ke halaman login'); window.location.href='index.php';</script>";
                    } else {
                        echo "<script>alert('Gagal membuat akun, silahkan anda coba lagi');</script>";
                    }
                }
            }
        ?>

    </body>

</html>