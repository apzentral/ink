<?php
namespace Tests\Template;
use apzentral\ink\Template\InkTemplate;
class InkTemplateTest extends \PHPUnit_Framework_TestCase
{
    private $template;

    function setUp()
    {
        $this->template = new InkTemplate;
    }

    public function testCanCreateInkTemplate()
    {
        $this->template = new InkTemplate;
    }

    public function testCanGetCorrectHeaderAndFooter()
    {
        $html = $this->template->getMailContent(true);
        $this->assertContains($this->minify($this->getInkMarkUp()) , $html);
    }

    public function testCanSetBodyMessage()
    {
        $content = '<h1>Hello World</h1>';
        $this->template->setBodyContent($content);
        $this->assertContains($content, $this->template->getMailContent());
    }

    public function testCanAppendBodyMessage()
    {
        $content = '<h1>Hello World</h1>';
        $appendContent = '<h2>Test Text</h2>';
        $this->template->setBodyContent($content);
        $this->template->appendBodyContent($appendContent);
        $this->assertContains($content . $appendContent, $this->template->getMailContent());
    }

    public function testCanPrependBodyMessage()
    {
        $content = '<h1>Hello World</h1>';
        $prependContent = '<h2>Test Text</h2>';
        $this->template->setBodyContent($content);
        $this->template->prependBodyContent($prependContent);
        $this->assertContains($prependContent . $content, $this->template->getMailContent());
    }

    private function minify($text)
    {
        return preg_replace('/\s+/', ' ', $text);
    }

    private function getInkMarkUp()
    {
        $css = file_get_contents(__DIR__ . '/../../../src/ink/css/ink.css');
        return <<< HTML
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width"/>
    <style type="text/css">
    {$css}
    </style>
    <style type="text/css">
    </style>
  </head>
  <body>
    <table class="body">
      <tr>
        <td class="center" align="center" valign="top">
          <center>
          </center>
        </td>
      </tr>
    </table>
  </body>
</html>
HTML;


    }
}
