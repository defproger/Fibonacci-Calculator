<?php

namespace App\Services;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class TemplateMailer
{
    private $mail;
    private $templatePath;

    public function __construct()
    {
        $this->mail = new PHPMailer(true);
        $this->templatePath = __DIR__ . '/../../public/assets/mailTemplates/';
        $this->setupMailer();
    }

    private function setupMailer()
    {
        $config = require __DIR__ . '/../../config/mail.php';

        $this->mail->isSMTP();
        $this->mail->Host = $config['host'];
        $this->mail->SMTPAuth = true;
        $this->mail->Username = $config['username'];
        $this->mail->Password = $config['password'];
        $this->mail->SMTPSecure = 'tls';
        $this->mail->Port = 587;

        $this->mail->setFrom($config['address'], $config['addressName']);
    }

    public function sendMail($to, $subject, $templateName, $data)
    {
        try {
            $htmlBody = $this->getTemplate($templateName, $data);

            $this->mail->addAddress($to);
            $this->mail->isHTML(true);
            $this->mail->Subject = $subject;
            $this->mail->Body = $htmlBody;

            $this->mail->send();
            return true;
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$this->mail->ErrorInfo}";
            return false;
        }
    }

    private function getTemplate($templateName, $data)
    {
        $templateFile = $this->templatePath . $templateName . '.html';

        if (!file_exists($templateFile)) {
            throw new \Exception("Template file not found: " . $templateFile);
        }

        $templateContent = file_get_contents($templateFile);

        foreach ($data as $key => $value) {
            $templateContent = str_replace("{{{$key}}}", $value, $templateContent);
        }

        return $templateContent;
    }
}