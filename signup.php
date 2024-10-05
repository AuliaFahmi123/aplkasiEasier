<?php 
$conn = mysqli_connect("localhost", "root", "", "easier");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="boot/css/bootstrap.min.css">
</head>
<style>
    .login{
       background-color: rgb(255, 255, 255);
       align-items: center;
       margin-top: 50px;
       border-radius: 20px;
    }
    body{
        background: linear-gradient(45deg, #d2001a, #7462ff, #f48e21, #23d5ab);
    }
    .container1{
        height: 100vh;
        width: 100%;
        background: linear-gradient(45deg, #d2001a, #7462ff, #f48e21, #23d5ab) ;
        background-size: 300% 300%;
        animation: color 12s ease-in-out infinite;
    }
    @keyframes color{
        0%{
            background-position: 0 50%;
        }
        50%{
            background-position: 100% 50%;
        }
        100%{
            background-position: 0 50%;
        }
    }
    
</style>
<body>

  <div class="container1">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="login" style="margin-left: 20px; margin-right: 20px;">
                <div class="container">
                 <div class="row justify-content-center text-center">  
                    <div class="col-md-6"> 
                <img src="img/logo_perusahaan-removebg-preview.png" alt="" style="width: 200px; height: 200px;">
                <h1 style="font-style: italic;">Sign Up</h1>
                </div>  
                </div>
                <div class="container">
                <form action="" method="post">
                    <input type="text" name="username" class="form-control">
                    <div style="height: 20px;"></div>
                    <input type="password" name="password" class="form-control">
                <div class="display" style="display: flex; flex-direction: column;">
                <a href="index.html" style="margin-top: 20px">login</a>
                <button class="btn btn-primary" name="register" style="margin-top: 20px; margin-bottom: 30px;">Register</button>
                </div>
                </form>
            </div>
            </div>
        </div>
    </div>
  </div> 
  </div> 
</body>
<script src="boot/js/bootstrap.min.js"></script>
</html>

<?php
 
if (isset($_POST['register'])) {
    // Mengambil data dari form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hash password sebelum disimpan (opsional tapi direkomendasikan untuk keamanan)
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Query untuk memasukkan data ke dalam tabel login
    $sql = "INSERT INTO login (username, password) VALUES ('$username', '$password')";

    // Menjalankan query
    if (mysqli_query($conn, $sql)) {
        header("Location: index.html");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
;