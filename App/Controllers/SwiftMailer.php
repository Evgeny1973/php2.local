<?php

namespace App\Controllers;

use App\Service\SwiftMailService;

class SwiftMailer extends SwiftMailService{

       /**
     *Отправка админу email
     */
    public function sendEmail($e) {
        $message = (new \Swift_Message)
            ->setFrom('admin@php2.local')
            ->setTo('gren33@mail.ru')
            ->setSubject('Attension! Ошибка соединения с БД')
            ->setBody($e);

        $this->mailer->send($message);
    }
}
