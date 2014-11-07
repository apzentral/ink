<?php
namespace apzentral\ink;
use apzentral\ink\Template\TemplateInterface;
use apzentral\ink\Template\InkTemplate;
class Mailer
{
    private $template;
    private $transport;
    private $mailer;

    function __construct(TemplateInterface $template = null)
    {
        if (is_null($template)) {
            $this->template = new InkTemplate;
        }
        $this->transport = \Swift_MailTransport::newInstance();
        $this->mailer = \Swift_Mailer::newInstance($this->transport);
    }

    public function setTransport($transport)
    {
        $this->transport = $transport;
        $this->mailer = \Swift_Mailer::newInstance($this->transport);
    }

    public function mail($subject, $from, $to, $body, $cc = null)
    {
        $this->template->setBodyContent($body);
        $message = \Swift_Message::newInstance($subject)->setFrom($from)->setTo($to);
        if ($cc) {
            $message->setCc($cc);
        }
        $message->setBody($this->template->getMailContent() , 'text/html');
        $message->addPart(strip_tags($body) , 'text/plain');
        // Send the message
        $result = $this->mailer->send($message);
        if (!$result) {
            throw new \RuntimeException('Could not be able to send mail.');
        }
        return $result;
    }
}
