<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/vendor/autoload.php';

function kirimOTP($emailTujuan, $kode)
{
    $mail = new PHPMailer(true);

    try {
        // ===== SMTP CONFIG =====
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'aesyaditya6@gmail.com'; 
        $mail->Password   = 'ldtchorlcfvbnjbb';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // ===== PENGIRIM & PENERIMA =====
        $mail->setFrom('EMAILKAMU@gmail.com', 'Catering Online');
        $mail->addAddress($emailTujuan);

        // ===== ISI EMAIL =====
        $mail->isHTML(true);
        $mail->Subject = 'Kode Verifikasi Akun Anda';
        $mail->Body    = "
            <h2>Verifikasi Email</h2>
            <p>Kode OTP Anda:</p>
            <h1 style='color:#4e73df;'>$kode</h1>
            <p>Jangan bagikan kode ini ke siapa pun.</p>
        ";

        $mail->send();
        return true;

    } catch (Exception $e) {
        echo "<b>EMAIL GAGAL:</b> {$mail->ErrorInfo}";
        return false;
    }
}
