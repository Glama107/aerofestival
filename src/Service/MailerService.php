<?php

namespace App\Service;

use App\Entity\Contact;
use Symfony\Bridge\Twig\Mime\NotificationEmail;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\Mailer\MailerInterface;

class MailerService
{
    public function __construct(
        #[Autowire('%admin_email%')] private string $adminEmail,
        #[Autowire('%sender_email%')] private string $senderEmail,
        private readonly MailerInterface $mailer

    ){
    }

    public function sendEmail(Contact $contact){
        $email = (new NotificationEmail())
            ->from($this->adminEmail)
            ->to($this->senderEmail)
            ->subject('Demande de contact depuis Aerofestival.fr')
            ->htmlTemplate('emails/contact.html.twig')
            ->context([
                'contact' => $contact,
            ])
            ;

        $this->mailer->send($email);
    }


}