<?php

namespace App\Service;

use App\Config;

class SwiftMailService {

    protected $mailer;

    /**
     * SwiftMailService constructor.
     */
    public function __construct() {
        $config = Config::instance();
        $transport = (new \Swift_SmtpTransport($config->data['swiftmailer']['host'],
            $config->data['swiftmailer']['port']))
            ->setUsername($config->data['swiftmailer']['username'])
            ->setPassword($config->data['swiftmailer']['password']);

        $this->mailer = new \Swift_Mailer($transport);
    }
}
