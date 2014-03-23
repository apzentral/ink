<?php
namespace Tests;
use apzentral\ink\Mailer;
/**
 * Test Mailer
 */
class MailerTest extends \PHPUnit_Framework_TestCase
{
    private $mailer;

    function setUp()
    {
        $this->mailer = new Mailer;
    }

    public function testCanCreateMailer()
    {
        $mailer = new Mailer;
    }

    public function testCanMail()
    {
        $subject = 'Hello Mailer';
        $from = 'apzentral@gmail.com';
        $to = 'apzentral@gmail.com';
        $body = '<h1>Hello Mailer</h1><p>This is test email.</p>';
        $this->mailer->mail($subject, $from, $to, $body);
    }
}
