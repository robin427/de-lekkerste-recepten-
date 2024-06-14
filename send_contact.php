<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);
    
    $to = "jouw_email@example.com"; // Verander dit naar je eigen e-mailadres
    $subject = "Nieuw contactformulier bericht van $name";
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    $email_body = "<h2>Nieuw bericht van contactformulier</h2>
                   <p><strong>Naam:</strong> $name</p>
                   <p><strong>Email:</strong> $email</p>
                   <p><strong>Bericht:</strong><br>$message</p>";

    if (mail($to, $subject, $email_body, $headers)) {
        echo "<p>Bedankt voor je bericht, $name. We nemen zo snel mogelijk contact met je op.</p>";
    } else {
        echo "<p>Er is een fout opgetreden bij het verzenden van je bericht. Probeer het later opnieuw.</p>";
    }
} else {
    echo "<p>Ongeldige aanvraag. Gebruik het contactformulier om een bericht te verzenden.</p>";
}
?>
