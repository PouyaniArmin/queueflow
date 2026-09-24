<?php

namespace Services;

use Config\Env;
use PHPMailer\PHPMailer\PHPMailer;

class MailService
{
    private ?string $mailHost = null;
    private ?string $mailPort = null;
    private ?string $mailUsername = null;
    private ?string $mailPassword = null;
    private ?string $mailFromAddress = null;
    private ?string $mailFromName = null;
    private ?PHPMailer $mailer = null;
    public function __construct()
    {
        $this->mailHost = Env::getEnv('MAIL_HOST');
        $this->mailPort = Env::getEnv('MAIL_PORT');
        $this->mailUsername = Env::getEnv('MAIL_USERNAME');
        $this->mailPassword = Env::getEnv('MAIL_PASSWORD');
        $this->mailFromAddress = Env::getEnv('MAIL_FROM_ADDRESS');
        $this->mailFromName = Env::getEnv('MAIL_FROM_NAME');
        $this->mailer = new PHPMailer(true);
        $this->configure();
    }
    private function configure()
    {
        $this->mailer->isSMTP();
        $this->mailer->Host       = $this->mailHost;
        $this->mailer->SMTPAuth   = true;
        $this->mailer->Username   = $this->mailUsername;
        $this->mailer->Password   = $this->mailPassword;
        $this->mailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $this->mailer->Port       = (int) $this->mailPort;
        $this->mailer->CharSet    = 'UTF-8';

        $this->mailer->setFrom($this->mailFromAddress, $this->mailFromName);
    }
    public function sendAppointmentEmail(string $to, string $subject, string $body, bool $isHtml = true): bool
    {
        try {
            $this->mailer->clearAddresses();
            $this->mailer->clearAttachments();

            $this->mailer->addAddress($to);
            $this->mailer->isHTML($isHtml);
            $this->mailer->Subject = $subject;
            $this->mailer->Body    = $body;

            if ($isHtml) {
                $this->mailer->AltBody = strip_tags($body);
            }

            return $this->mailer->send();
        } catch (\Exception $e) {
            return false;
        }
    }

    public function sendBookingEmail(string $to, string $customerName, string $dateTime): bool
    {
        $subject = 'Your appointment has been booked';

        $body = '
                <p>Hello ' . htmlspecialchars($customerName) . ',</p>
                <p>Your appointment has been successfully booked.</p>
                <p><strong>Date & time:</strong> ' . htmlspecialchars($dateTime) . '</p>
                <p>Thank you.</p>';
        return $this->sendAppointmentEmail($to, $subject, $body);
    }
}
