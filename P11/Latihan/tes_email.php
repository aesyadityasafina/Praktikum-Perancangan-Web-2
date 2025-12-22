<?php
require "kirim_email.php";

if (kirimOTP("EMAILKAMU@gmail.com", "123456")) {
    echo "EMAIL BERHASIL TERKIRIM";
} else {
    echo "EMAIL GAGAL";
}
