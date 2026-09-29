<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Config\Env;
use PhpAmqpLib\Message\AMQPMessage;
use Services\MailService;
use Services\QueueService;

Env::getInstance();
Env::load(dirname(__DIR__));

echo "Email worker started...\n";

$queue = new QueueService();
$mail  = new MailService();

$queue->consume(function (AMQPMessage $message) use ($mail) {
    $data = json_decode($message->getBody(), true);

    if (!is_array($data)) {
        echo "Invalid message\n";
        $message->ack();
        return;
    }

    $type     = $data['type'] ?? '';
    $email    = $data['email'] ?? '';
    $name     = $data['customer_name'] ?? ($data['name'] ?? '');
    $dateTime = $data['date_time'] ?? ($data['dateTime'] ?? '');

    if ($email === '') {
        echo "No email in message\n";
        $message->ack();
        return;
    }

    $ok = false;

    if ($type === 'booking') {
        $ok = $mail->sendBookingEmail($email, $name, $dateTime);
        echo $ok ? "Booking email sent to {$email}\n" : "Failed booking email to {$email}\n";
    } elseif ($type === 'cancel') {
        $ok = $mail->sendCancelEmail($email, $name, $dateTime);
        echo $ok ? "Cancel email sent to {$email}\n" : "Failed cancel email to {$email}\n";
    } else {
        echo "Unknown type: {$type}\n";
    }

    $message->ack();
});