<?php

namespace App\Service;

use App\Config;
use Swift_Mailer;
use Swift_Message;
use Swift_SmtpTransport;

class Mailer
{

    protected $mailer;

    /**
     * SwiftMail constructor.
     */
    public function __construct()
    {
        $config = Config::instance();
        $transport = (new Swift_SmtpTransport($config->data['swiftmailer']['host'],
            $config->data['swiftmailer']['port']))
            ->setUsername($config->data['swiftmailer']['username'])
            ->setPassword($config->data['swiftmailer']['password']);

       $this->mailer = new Swift_Mailer($transport);
    }

    /**
     * Рендер письма с ошибкой и отправка админу
     * @param $e
     */
    public function sendEmail($e): void
    {
        $config = Config::instance();
        $message = (new Swift_Message)
            ->setFrom($config->data['emails']['from'])
            ->setTo($config->data['emails']['admin'])
            ->setSubject('Attention! Ошибка соединения с БД')
            ->setBody($e);

        $this->mailer->send($message);
    }
}
