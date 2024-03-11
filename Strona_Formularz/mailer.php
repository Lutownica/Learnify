<?php
// Pobieranie danych z formularza
$name = $_POST['name'];
$phone = $_POST['phone'];
$offer = $_POST['offer'];

// Adres e-mail, na który zostanie wysłana wiadomość
$to = 'skarboisek@gmail.com';

// Temat wiadomości
$subject = 'Nowa oferta od ' . $name;

// Treść wiadomości
$message = 'Imię: ' . $name . "\r\n";
$message .= 'Telefon: ' . $phone . "\r\n";
$message .= 'Oferta: ' . $offer;

// Nagłówki
$headers = 'From: ' . $name . "\r\n" .
    'Reply-To: ' . $to . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

// Wysyłanie wiadomości e-mail
$mailSent = mail($to, $subject, $message, $headers);

// Zwracanie odpowiedzi do przeglądarki
if ($mailSent) {
    http_response_code(200);
    echo 'Dane zostały pomyślnie wysłane!';
} else {
    http_response_code(500);
    echo 'Wystąpił błąd podczas wysyłania danych.';
}
?>
