<?php
require 'function.php';

if ( isset($_POST["register"])) {
    
    if( registrasi($_POST) > 0 ){
        echo "<script>
                alert('akun anda berhasil dibuat!');
             </script>";
    } else {
        echo mysqli_error($conn);
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
</head>
<body>

<h2>Halaman Registrasi</h2>

<form action="" method="post">
    <label for="username">username  :</label>
    <input type="text" name="username" id="username">
    <br>
    <label for="password">password  :</label>
    <input type="password" name="password" id="password">
    <br>
    <label for="password2">konfirmasi password :</label>
    <input type="password" name="password2" id="password2">
    <br>
    <button type="submit" name="register">Register</button>
    <br>
    <br>
    <a href="login.php">Login</a>

</form>
    
</body>
</html>