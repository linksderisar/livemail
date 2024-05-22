<?php

namespace Linksderisar\Livemail;

use Linksderisar\Livemail\Models\Livemail;
use Symfony\Component\Mailer\SentMessage;
use Symfony\Component\Mailer\Transport\AbstractTransport;

class LiveMailTransport extends AbstractTransport
{
    protected function doSend(SentMessage $message): void
    {
        /*--------------------------------------------------------------------------------------------------------------
         *
         * There has to be a better way
         *
         -------------------------------------------------------------------------------------------------------------*/
        $message = $message->getOriginalMessage();
        /**
         * @var \Symfony\Component\Mime\Email $message
         */

        /*--------------------------------------------------------------------------------------------------------------
         *
         * Extract From
         *
         -------------------------------------------------------------------------------------------------------------*/
        $from_name = $message->getFrom()[0]->getName();
        $from_email = $message->getFrom()[0]->getAddress();

        /*--------------------------------------------------------------------------------------------------------------
         *
         * Extract To
         *
         -------------------------------------------------------------------------------------------------------------*/
        $to = [];

        /**
         * @var $toArray \Symfony\Component\Mime\Address
         */
        foreach ($message->getTo() as $toArray) {
            $to[] = $toArray->getAddress();
        }

        /*--------------------------------------------------------------------------------------------------------------
         *
         * Extract CC
         *
         -------------------------------------------------------------------------------------------------------------*/
        $cc = [];

        /**
         * @var $ccArray \Symfony\Component\Mime\Address
         */
        foreach ($message->getCc() as $ccArray) {
            $cc[] = $ccArray->getAddress();
        }

        /*--------------------------------------------------------------------------------------------------------------
         *
         * Extract BCC
         *
         -------------------------------------------------------------------------------------------------------------*/
        $bcc = [];

        /**
         * @var $bccArray \Symfony\Component\Mime\Address
         */
        foreach ($message->getCc() as $bccArray) {
            $bcc[] = $bccArray->getAddress();
        }

        /*--------------------------------------------------------------------------------------------------------------
         *
         * Extract attachments
         *
         -------------------------------------------------------------------------------------------------------------*/
        /**
         * @var \Symfony\Component\Mime\Part\DataPart $attachment
         */
        foreach ($message->getAttachments() as $attachment) {
            // ??????
        }

        Livemail::create([
            'subject' => $message->getSubject(),
            'from_name' => $from_name,
            'from_email' => $from_email,
            'to' => $to,
            'cc' => $cc,
            'bcc' => $bcc,
            'html' => $message->getHtmlBody(),
        ]);
    }

    public function __toString(): string
    {
        return 'livemail';
    }
}
