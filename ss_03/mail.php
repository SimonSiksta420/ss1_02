<?php 
require_once 'vendor'. DIRECTORY_SEPARATOR .'autoload.php';
use Symfony\Component\Dotenv\Dotenv;

$dotenv = new Dotenv();
$dotenv->load(__DIR__.'/.env');

$mail = new Nette\Mail\Message;
$mail->setFrom('Někdo <simon.siksta@seznam.cz>')
    ->addTo('simon.siksta@student.ossp.cz')
    ->setSubject('Order of a book')
    ->setBody("Damn you should read your books that you bought");

    $mailer = new Nette\Mail\SmtpMailer([
        'host' => $_ENV['EMAIL_HOST'],
        'port' => $_ENV['EMAIL_PORT'],
        'username' => $_ENV['EMAIL_USERNAME'],
        'password' => $_ENV['EMAIL_PASSWORD'],
        'secure' => $_ENV['EMAIL_SECURE'],
    ]);
    $result = $mailer->send($mail);
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nette</title>
</head>
<body>

<?php
echo "$result";
?>

</body>
</html>