<?php

namespace App\Controllers;

use App\Config;

class EmailSender
{

    protected $mailer;

    /**
     * SwiftMail constructor.
     */
    public function __construct()
    {
        $config = Config::instance();
        $transport = (new \Swift_SmtpTransport($config->data['swiftmailer']['host'],
            $config->data['swiftmailer']['port']))
            ->setUsername($config->data['swiftmailer']['username'])
            ->setPassword($config->data['swiftmailer']['password']);

        $this->mailer = new \Swift_Mailer($transport);
    }

    /**
     * Рендер письма с ошибкой и отправка админу
     * @param $e
     */
    public function sendEmail($e): void
    {

        $message = (new \Swift_Message)
            ->setFrom('admin@php2.local')
            ->setTo('gren33@mail.ru')
            ->setSubject('Attension! Ошибка соединения с БД')
            ->setBody($e);

        $this->mailer->send($message);
    }
}
