<?php
//koneksi database
$conn = mysqli_connect("localhost", "root", "", "keamanan");

function registrasi($data) {
    global $conn;

    $username = stripslashes($data["username"]);
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    //cek username
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
    
    if( mysqli_fetch_assoc($result) ) {
        echo "<script>
            alert('username sudah ada!')
            </script>";
        return false;
    }

    //cek password
    if ( $password !== $password2) {
        echo "<script>
                alert('konfirmasi password salah!');
              </script>";
        return false;
    }
    
    // enkripsi password dengan password_hash
    $password = password_hash($password, PASSWORD_DEFAULT);

    //tambah user baru ke database
    mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password')");

    return mysqli_affected_rows($conn);
}
?>