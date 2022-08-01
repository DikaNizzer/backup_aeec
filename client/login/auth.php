<?php

require '../method.php';

//Registrasi User
if( isset ($_POST["regis"])){

$cek_email  = 0;
$cek_news   = 0;

if(isset($_POST["check_email"])){
    $cek_email = 1;
}

if(isset($_POST["check_news"])){
    $cek_news = 1;
}



    if($_POST["password"] != $_POST["password2"]){
        echo "<script> 
        alert('Password Yang Anda Masukkan Berbeda !!');
        document.location.href = 'registrasi.php';
        </script>";
        exit;
    }

    $email= strtolower (htmlspecialchars($_POST["email"]));
    $pass= htmlspecialchars($_POST["password"]);
    $password = password_hash($pass, PASSWORD_DEFAULT);
    
    $cekemail=query("SELECT * FROM user where email = '$email'");
    if($cekemail != null){ //Cek email bila sudah pernah digunakan
        echo "<script> 
        alert('Registrasi Gagal, Email sudah Pernah Digunakan !!');
        document.location.href = 'registrasi.php';
        </script>";
        exit;
    }

    $masukan="INSERT INTO user (`EMAIL`, `PASSWORD`, `ROLE`, `AEEC_EMAIL`, `AEEC_NEWSLETTER` ) VALUES ('$email',  '$password', 'user', '$cek_email', '$cek_news')";
    mysqli_query($koneksi, $masukan); //buat query

    // Cek Data
    if (mysqli_affected_rows($koneksi) > 0){
        echo "<script> 
                alert('Registrasi Berhasil, Silahkan Login !!');
                document.location.href = 'login.php';
            </script>";
    }else{
        echo "<script> 
        alert('Registrasi Gagal, Coba Lagi !!');
        document.location.href = 'registrasi.php';
        </script>";
    }

  
}


//Login User
if( isset($_POST["login"]) ) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $cekid = mysqli_query($koneksi, "SELECT * from user where `EMAIL` = '$email' ");
    //cek id,  idnya ada tidak
    if( mysqli_num_rows($cekid) === 1){

        //cek paswword
        $user = mysqli_fetch_assoc($cekid);

        if( password_verify($password, $user["PASSWORD"]) ){

            
            // login sukses, alihkan ke halaman timeline
            if($user['ROLE'] == 'user'){
                // buat Session
                session_start();
                $_SESSION["user"] = $user;
                header("Location: ../dashboard/regular.php");
            }else{
                // buat Session
                session_start();
                $_SESSION["admin"] = $user;
                header("Location: ../../admin/layout/dashboard.php");
            }
            exit;
        }else{
            echo "<script> 
            alert('Login Gagal. Password atau Username salah, Silahkan Coba Lagi !!');
            document.location.href = 'login.php';
            </script>";
            
        }
    }else{
        echo "<script> 
        alert('Login Gagal. Password atau Username salah, Coba Lagi !!');
        document.location.href = 'login.php';
        </script>";
    }

}
