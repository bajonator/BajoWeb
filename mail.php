<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .phpbody {
            background-color: #303030;
            color: gainsboro;
            font-size: 20px;
        }
        .centered {
            text-align: center;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
    </style>
</head>
<body class="phpbody">
    <div class="centered">
        <?php 
            require 'PHPMailer/src/Exception.php';
            require 'PHPMailer/src/PHPMailer.php';
            require 'PHPMailer/src/SMTP.php';
            use PHPMailer\PHPMailer\PHPMailer;
            use PHPMailer\PHPMailer\Exception;
            use PHPMailer\PHPMailer\SMTP;
            
                    $imie_nadawcy = $_POST["imie_nadawcy"];
                    $adres_email = $_POST["adres_email"];
                    $tresc_wiadomosci = $_POST["tresc_wiadomosci"];
                    $mail = new PHPMailer(true);

                try{

                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';
                    $mail->SMTPAuth = true;
                    $mail->Username = 'bajonet@bajonet.net.pl';
                    $mail->Password = 'vwkmonxqdjeniall';
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                    $mail->Port = 587;
                    $mail->CharSet = 'utf-8';
                    $mail->setFrom("bajonet@bajonet.net.pl");
                    $mail->addAddress('bajo123@wp.pl');

                    $mail->isHTML(true);
                    $mail->Subject = 'Nowa wiadomość od użytkownika'. ' '. $imie_nadawcy.'; '.$adres_email;
                    $mail->Body = $tresc_wiadomosci;

                    $mail->send();
                    echo 'Dziękuję za wiadomość.'. "<br>".'Email zostanie rozpatrzony najszybciej jak będę mogł... Najpóźniej do 24 godzin.'."<br><br><br><br>". 'Przekierowanie na stronę główną nastąpi za <span id="countdown">5</span> sekund.'; 
                }
                catch(Exception $e){
                    error_reporting(E_ALL);
                    ini_set('display_errors', 1);
                    echo "Błąd wysyłania maila: {$mail->ErrorInfo}";
                    error_log("Błąd wysyłania maila: {$mail->ErrorInfo}");  
                }
        ?>
    </div>
<script>
    function startCountdown(seconds, redirectUrl) {
        var countdown = document.getElementById('countdown');

        var interval = setInterval(function() {
            seconds--;
            countdown.textContent = seconds;

            if (seconds <= 0) {
                clearInterval(interval);
                window.location.href = redirectUrl;
            }
        }, 1000); 
    }

    startCountdown(5, 'index.html'); 
</script>
</body>
</html>