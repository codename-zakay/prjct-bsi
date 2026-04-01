<?php
    include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login Ke Perpustakaan Digital</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        body {
            background-image: url('perpustakaan.jpg'); /* Ganti dengan jalur gambar latar belakang Anda */
            background-size: cover; /* Menutupi seluruh area */
            background-position: center; /* Memusatkan gambar */
        }
    </style>
</head>
<body>
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header text-center">
                                    <h3 class="font-weight-light my-4">Login Perpustakaan Digital</h3>
                                    <img src="logo.png" alt="logo" class="img-fluid" style="max-width: 100px;" />
                                </div>
                                <div class="card-body">
                                    <?php
                                        if(isset($_POST['login'])){
                                            $username = $_POST['username'];
                                            $password = md5($_POST['password']);
                                            $data = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'");
                                            if(mysqli_num_rows($data) > 0){
                                                $_SESSION['user'] = mysqli_fetch_array($data);
                                                echo '<script>alert("Selamat Datang, Login Berhasil"); location.href="index.php";</script>';
                                            } else {
                                                echo '<script>alert("Maaf, Username/Password salah")</script>';
                                            }
                                        }
                                    ?>
                                    <form method="post">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" name="username" placeholder="Enter Username" />
                                            <label>Username</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" type="password" name="password" placeholder="Password" />
                                            <label>Password</label>
                                        </div>
                                        <div class="d-flex justify-content-between mt-4 mb-0">
                                            <button class="btn btn-primary" type="submit" name="login">Login</button>
                                            <a class="btn btn-danger" href="register.php">Register</a>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small">&copy; 2025 Perpustakaan Digital.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>