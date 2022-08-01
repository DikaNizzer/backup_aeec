<?php
use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception; 
require '../method.php';

require '../../vendor/phpmailer/src/Exception.php'; 
require '../../vendor/phpmailer/src/PHPMailer.php'; 
require '../../vendor/phpmailer/src/SMTP.php'; 

if(isset($_GET['email'])){
    $email = $_GET['email'];
    // echo $email;

    $cekemail   = mysqli_query($koneksi, "SELECT * FROM user where EMAIL = '$email'");
    $user       = mysqli_fetch_assoc($cekemail);
	$iduser      = $user['ID_USER'];

    // var_dump($iduser);
    $mail = new PHPMailer(true); 
  
    try { 
                $mail->SMTPDebug = 2;                                                                                                    
                $mail->isSMTP();                                                                                                                         
                $mail->Host        = 'smtp.gmail.com;';                                                        
                $mail->SMTPAuth = true;                                                                           
                $mail->Username = 'andika.surya.rahmad-2020@vokasi.unair.ac.id';                                     
                $mail->Password = 'surabaya2001';                                                              
                $mail->SMTPSecure = 'tls';                                                                         
                $mail->Port         = 587; 
      
                $mail->setFrom('andika.surya.rahmad-2020@vokasi.unair.ac.id', 'AEEC Unair');             
                $mail->addAddress($email); // where you want to send mail 
                
                
                $mail->isHTML(true); 
                $body      = "Klik link berikut untuk reset Password, <a href='https://aeec.unair.ac.id/daftar/client/login/resetpassword.php?id_user=$iduser&email=$email'>Reset Password<a>"; //isi dari email
                $mail->Subject = 'Permintaan Reset Password'; 
                $mail->Body = $body; 
                $mail->AltBody = 'Body in plain text for non-HTML mail clients'; 
                $mail->send(); 
                echo "<script> alert('Link reset password telah dikirim ke email anda, Cek email untuk melakukan reset'); window.location = 'pesanpassword.php'; </script>";//jika pesan terkirim
    } catch (Exception $e) { 
                echo "Email tidak bisa terkirim. Mailer Error: {$mail->ErrorInfo}"; 
    } 
}


?>