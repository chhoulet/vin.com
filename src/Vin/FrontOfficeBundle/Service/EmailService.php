<?php

namespace Vin\FrontOfficeBundle\Service;

class EmailService
{
    private $mailer;

    public function __construct($mailer)
    {
        $this ->mailer = $mailer;
    }

    public function send($content)
    {
        $message = \Swift_Message:: newInstance();
        $message ->setSubject('Nouveau message')
                 ->setTo('chhoulet@yahoo.fr')
                 ->setFrom('chhoulet@yahoo.fr')
                 ->setBody($content);

        $this -> mailer ->send($message);
    }

}